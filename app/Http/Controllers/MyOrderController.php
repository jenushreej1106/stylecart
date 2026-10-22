<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class MyOrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = collect();

        $phone = $request->query('phone');

        if ($phone) {
            $orders = Order::with('items')
                ->where('phone', $phone)
                ->latest()
                ->get();
        }

        return view('my-orders.index', compact('orders', 'phone'));
    }
}