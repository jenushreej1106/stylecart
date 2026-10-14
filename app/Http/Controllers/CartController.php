<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // Display cart
    public function index()
    {
        $cart = session()->get('cart', []);

        $total = 0;

        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return view('cart.index', compact('cart', 'total'));
    }

    // Add product to cart
    public function add(Request $request, Product $product)
    {
        $quantity = (int) $request->input('quantity', 1);

        if ($quantity < 1) {
            return back()->with('error', 'Invalid quantity.');
        }

        if ($product->stock < 1) {
            return back()->with('error', 'This product is out of stock.');
        }

        $cart = session()->get('cart', []);

        $existingQuantity = $cart[$product->id]['quantity'] ?? 0;

        if ($existingQuantity + $quantity > $product->stock) {
            return back()->with(
                'error',
                'Only ' . $product->stock . ' item(s) are available in stock.'
            );
        }

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += $quantity;
        } else {
            $cart[$product->id] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => (float) $product->price,
                'image' => $product->image,
                'quantity' => $quantity,
            ];
        }

        session()->put('cart', $cart);

        return redirect()
            ->route('cart.index')
            ->with('success', 'Product added to cart!');
    }

    // Update quantity
    public function update(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cart = session()->get('cart', []);

        if (!isset($cart[$id])) {
            return redirect()->route('cart.index')
                ->with('error', 'Product not found in cart.');
        }

        $product = Product::find($id);

        if (!$product) {
            unset($cart[$id]);
            session()->put('cart', $cart);

            return redirect()->route('cart.index')
                ->with('error', 'Product is no longer available.');
        }

        $quantity = (int) $request->quantity;

        if ($quantity > $product->stock) {
            return back()->with(
                'error',
                'Only ' . $product->stock . ' item(s) are available.'
            );
        }

        $cart[$id]['quantity'] = $quantity;

        session()->put('cart', $cart);

        return redirect()->route('cart.index')
            ->with('success', 'Cart updated successfully!');
    }

    // Remove product
    public function remove($id)
    {
        $cart = session()->get('cart', []);

        unset($cart[$id]);

        session()->put('cart', $cart);

        return redirect()->route('cart.index')
            ->with('success', 'Product removed from cart!');
    }
}