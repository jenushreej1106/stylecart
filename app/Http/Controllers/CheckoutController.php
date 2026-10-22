<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()
                ->route('products.index')
                ->with('error', 'Your cart is empty!');
        }

        $total = 0;

        foreach ($cart as $item) {
            $total += (float) $item['price']
                * (int) $item['quantity'];
        }

        return view('checkout.index', compact('cart', 'total'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:1000',

            'payment_method' => 'required|in:COD,GPay',
        ]);

        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()
                ->route('products.index')
                ->with('error', 'Your cart is empty!');
        }

        $order = DB::transaction(function () use ($cart, $validated) {

            $total = 0;
            $lockedProducts = [];

            foreach ($cart as $productId => $item) {

                $quantity = (int) ($item['quantity'] ?? 0);

                if ($quantity < 1) {
                    throw ValidationException::withMessages([
                        'cart' => 'Invalid product quantity.',
                    ]);
                }

                $product = Product::whereKey($productId)
                    ->lockForUpdate()
                    ->first();

                if (!$product) {
                    throw ValidationException::withMessages([
                        'cart' => 'A product is no longer available.',
                    ]);
                }

                if ($product->stock < $quantity) {
                    throw ValidationException::withMessages([
                        'cart' => $product->name .
                            ' has only ' . $product->stock .
                            ' item(s) available.',
                    ]);
                }

                $price = (float) $product->price;
                $subtotal = $price * $quantity;

                $total += $subtotal;

                $lockedProducts[] = [
                    'product' => $product,
                    'quantity' => $quantity,
                    'price' => $price,
                    'subtotal' => $subtotal,
                ];
            }

            /*
             * COD: payment is collected on delivery.
             * GPay: do not mark paid until payment
             * is verified through a payment gateway.
             */
            $paymentMethod = $validated['payment_method'];

            $order = Order::create([
                'customer_name' => $validated['customer_name'],
                'phone' => $validated['phone'],
                'address' => $validated['address'],
                'total_amount' => $total,
                'payment_method' => $paymentMethod,
                'status' => 'Pending',
            ]);

            foreach ($lockedProducts as $item) {

                $product = $item['product'];
                $quantity = $item['quantity'];

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'product_name' => $product->name,
                    'price' => $item['price'],
                    'quantity' => $quantity,
                    'subtotal' => $item['subtotal'],
                ]);

                $product->decrement('stock', $quantity);
            }

            return $order;
        }, 3);

        session()->forget('cart');

        return redirect()
            ->route('checkout.success', $order->id)
            ->with('success', 'Order placed successfully!');
    }

    public function success($id)
    {
        $order = Order::with('items')->findOrFail($id);

        return view('checkout.success', compact('order'));
    }
}