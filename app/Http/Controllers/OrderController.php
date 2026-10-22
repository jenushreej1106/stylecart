<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Display all orders
    public function index()
    {
        $orders = Order::latest()->paginate(10);

        return view('orders.index', compact('orders'));
    }

    // Display one order
    public function show($id)
    {
        $order = Order::with('items')->findOrFail($id);

        return view('orders.show', compact('order'));
    }

    // Update order status
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Pending,Processing,Shipped,Delivered,Cancelled',
        ]);

        $order = Order::findOrFail($id);

        $order->update([
            'status' => $request->status,
        ]);

        return redirect()
            ->route('orders.index')
            ->with('success', 'Order status updated successfully!');
    }
}