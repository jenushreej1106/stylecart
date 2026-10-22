<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Dashboard Statistics
        $totalProducts = Product::count();

        $totalCategories = Category::count();

        $totalOrders = Order::count();

        $totalSales = Order::sum('total_amount');

        // Today's Sales
        $todaySales = Order::whereDate('created_at', today())
            ->sum('total_amount');

        // Today's Orders
        $todayOrders = Order::whereDate('created_at', today())
            ->count();

        // Monthly Sales for Current Year
        $monthlySalesData = Order::selectRaw(
                'MONTH(created_at) as month, SUM(total_amount) as total'
            )
            ->whereYear('created_at', now()->year)
            ->groupByRaw('MONTH(created_at)')
            ->pluck('total', 'month');

        $monthlyLabels = [];
        $monthlySales = [];

        for ($month = 1; $month <= 12; $month++) {
            $monthlyLabels[] = date('M', mktime(0, 0, 0, $month, 1));

            $monthlySales[] = (float) ($monthlySalesData[$month] ?? 0);
        }

        // Best-Selling Products
        $bestSellingProducts = OrderItem::select(
                'product_name',
                DB::raw('SUM(quantity) as total_quantity'),
                DB::raw('SUM(subtotal) as total_revenue')
            )
            ->groupBy('product_name')
            ->orderByDesc('total_quantity')
            ->take(5)
            ->get();

        // Recent Orders
        $recentOrders = Order::latest()
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalProducts',
            'totalCategories',
            'totalOrders',
            'totalSales',
            'todaySales',
            'todayOrders',
            'monthlyLabels',
            'monthlySales',
            'bestSellingProducts',
            'recentOrders'
        ));
    }
}