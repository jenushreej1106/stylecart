<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StyleCart | Dashboard</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
    * { margin: 0; padding: 0; box-sizing: border-box; }

    :root {
        --gold: #d4af37;
        --bg: #080808;
        --card: #151515;
        --border: #403622;
        --muted: #aaa;
    }

    body {
        background: var(--bg);
        color: #fff;
        font-family: Arial, sans-serif;
        min-height: 100vh;
    }

    nav {
        background: #080808;
        border-bottom: 1px solid var(--gold);
        padding: 20px 6%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        flex-wrap: wrap;
    }

    .logo {
        color: var(--gold);
        font: bold 30px Georgia, serif;
        text-decoration: none;
    }

    .nav-links {
        display: flex;
        align-items: center;
        gap: 22px;
        flex-wrap: wrap;
    }

    .nav-links a {
        color: #fff;
        text-decoration: none;
        font-size: 14px;
        transition: .3s;
    }

    .nav-links a i {
        color: var(--gold);
        margin-right: 5px;
    }

    .nav-links a:hover { color: var(--gold); }

    .container {
        width: 90%;
        max-width: 1400px;
        margin: 45px auto;
        animation: slideUp .6s ease;
    }

    .eyebrow {
        color: var(--gold);
        font-size: 11px;
        letter-spacing: 5px;
        margin-bottom: 18px;
    }

    .page-heading {
        font: bold clamp(32px, 4vw, 48px) Georgia, serif;
        margin-bottom: 15px;
    }

    .page-heading span, .section-heading span { color: var(--gold); }

    .subtitle {
        color: #bbb;
        line-height: 1.7;
        margin-bottom: 32px;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 22px;
        margin-bottom: 40px;
    }

    .stat-card, .panel {
        background: var(--card);
        border: 1px solid var(--border);
        border-radius: 10px;
        padding: 25px;
    }

    .stat-card {
        transition: transform .3s, border-color .3s;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        border-color: var(--gold);
    }

    .stat-top {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 10px;
        margin-bottom: 18px;
    }

    .stat-card p { color: #bbb; font-size: 13px; }

    .stat-icon {
        width: 44px;
        height: 44px;
        display: grid;
        place-items: center;
        border-radius: 9px;
        color: var(--gold);
        background: #282414;
        font-size: 19px;
    }

    .stat-card h2 {
        color: var(--gold);
        font-size: 30px;
    }

    .section-heading {
        font: bold 25px Georgia, serif;
        margin-bottom: 22px;
    }

    .panels-grid {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 22px;
        margin-bottom: 35px;
    }

    .chart-container {
        position: relative;
        height: 300px;
    }

    .quick-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        margin-bottom: 20px;
    }

    .action-btn {
        display: inline-block;
        padding: 12px 16px;
        border: 1px solid var(--gold);
        border-radius: 5px;
        color: var(--gold);
        text-decoration: none;
        transition: .3s;
        font-size: 13px;
    }

    .action-btn i { margin-right: 5px; }

    .action-btn:hover {
        background: var(--gold);
        color: #080808;
    }

    .muted { color: var(--muted); line-height: 1.7; }

    .table-wrap { overflow-x: auto; }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }

    th, td {
        padding: 14px 10px;
        text-align: left;
        border-bottom: 1px solid #333;
        font-size: 13px;
        white-space: nowrap;
    }

    th { color: var(--gold); }
    td { color: #eee; }

    .status {
        display: inline-block;
        padding: 6px 10px;
        border-radius: 20px;
        background: #282414;
        color: var(--gold);
        font-size: 12px;
    }

    .empty {
        text-align: center;
        padding: 25px;
        color: var(--muted);
    }

    footer {
        text-align: center;
        padding: 25px;
        border-top: 1px solid #333;
        color: #888;
        font-size: 12px;
    }

    @keyframes slideUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @media (max-width: 1000px) {
        .stats-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
        .panels-grid { grid-template-columns: 1fr; }
    }

    @media (max-width: 600px) {
        nav { padding: 18px 5%; }
        .container { width: 92%; margin-top: 30px; }
        .stats-grid { grid-template-columns: 1fr; }
        .stat-card h2 { font-size: 26px; }
        .panel, .stat-card { padding: 18px; }
    }
</style>

</head>
<body>

<nav>
    <a href="{{ route('dashboard') }}" class="logo">
        <i class="fa-solid fa-bag-shopping"></i> StyleCart.
    </a>

<div class="nav-links">
    <a href="{{ route('dashboard') }}"><i class="fa-solid fa-chart-line"></i> Dashboard</a>
    <a href="{{ route('products.index') }}"><i class="fa-solid fa-box"></i> Products</a>
    <a href="{{ route('categories.index') }}"><i class="fa-solid fa-layer-group"></i> Categories</a>
    <a href="{{ route('cart.index') }}"><i class="fa-solid fa-cart-shopping"></i> Cart</a>
    <a href="{{ route('wishlist.index') }}"><i class="fa-solid fa-heart"></i> Wishlist</a>
    <a href="{{ route('my-orders.index') }}"><i class="fa-solid fa-receipt"></i> My Orders</a>
    <a href="{{ route('orders.index') }}"><i class="fa-solid fa-clipboard-list"></i> Manage Orders</a>
</div>

</nav>

<main class="container">
    <p class="eyebrow">STYLECART ADMINISTRATION</p>

<h1 class="page-heading">Dashboard <span>Overview</span></h1>

<p class="subtitle">
    Welcome to your StyleCart dashboard. Monitor products, orders and sales from one place.
</p>

<section class="stats-grid">
    <div class="stat-card">
        <div class="stat-top">
            <p>Total Products</p>
            <div class="stat-icon"><i class="fa-solid fa-box"></i></div>
        </div>
        <h2>{{ number_format($totalProducts ?? 0) }}</h2>
    </div>

    <div class="stat-card">
        <div class="stat-top">
            <p>Total Categories</p>
            <div class="stat-icon"><i class="fa-solid fa-layer-group"></i></div>
        </div>
        <h2>{{ number_format($totalCategories ?? 0) }}</h2>
    </div>

    <div class="stat-card">
        <div class="stat-top">
            <p>Total Orders</p>
            <div class="stat-icon"><i class="fa-solid fa-cart-shopping"></i></div>
        </div>
        <h2>{{ number_format($totalOrders ?? 0) }}</h2>
    </div>

    <div class="stat-card">
        <div class="stat-top">
            <p>Total Sales</p>
            <div class="stat-icon"><i class="fa-solid fa-indian-rupee-sign"></i></div>
        </div>
        <h2>₹{{ number_format($totalSales ?? 0, 2) }}</h2>
    </div>

    <div class="stat-card">
        <div class="stat-top">
            <p>Today's Orders</p>
            <div class="stat-icon"><i class="fa-solid fa-calendar-check"></i></div>
        </div>
        <h2>{{ number_format($todayOrders ?? 0) }}</h2>
    </div>

    <div class="stat-card">
        <div class="stat-top">
            <p>Today's Sales</p>
            <div class="stat-icon"><i class="fa-solid fa-coins"></i></div>
        </div>
        <h2>₹{{ number_format($todaySales ?? 0, 2) }}</h2>
    </div>
</section>

<section class="panels-grid">
    <div class="panel">
        <h2 class="section-heading"><i class="fa-solid fa-chart-area"></i> Monthly <span>Sales</span></h2>
        <div class="chart-container">
            <canvas id="monthlySalesChart"></canvas>
        </div>
    </div>

    <div class="panel">
        <h2 class="section-heading"><i class="fa-solid fa-bolt"></i> Quick <span>Actions</span></h2>

        <div class="quick-actions">
            <a class="action-btn" href="{{ route('products.create') }}"><i class="fa-solid fa-plus"></i> Add Product</a>
            <a class="action-btn" href="{{ route('categories.create') }}"><i class="fa-solid fa-folder-plus"></i> Add Category</a>
            <a class="action-btn" href="{{ route('orders.index') }}"><i class="fa-solid fa-list"></i> View Orders</a>
        </div>

        <p class="muted">Use these shortcuts to manage your store quickly.</p>
    </div>
</section>

<section class="panel" style="margin-bottom:35px;">
    <h2 class="section-heading"><i class="fa-solid fa-trophy"></i> Best-Selling <span>Products</span></h2>

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity Sold</th>
                    <th>Revenue</th>
                </tr>
            </thead>
            <tbody>
                @forelse(($bestSellingProducts ?? collect()) as $product)
                    <tr>
                        <td>{{ $product->product_name }}</td>
                        <td>{{ $product->total_quantity }}</td>
                        <td>₹{{ number_format($product->total_revenue, 2) }}</td>
                    </tr>
                @empty
                    <tr><td colspan="3" class="empty">No sales data available yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</section>

<section class="panel" style="margin-bottom:35px;">
    <h2 class="section-heading"><i class="fa-solid fa-clock"></i> Recent <span>Orders</span></h2>

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Customer</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Details</th>
                </tr>
            </thead>
            <tbody>
                @forelse(($recentOrders ?? collect()) as $order)
                    <tr>
                        <td>#{{ $order->id }}</td>
                        <td>{{ $order->customer_name }}</td>
                        <td>₹{{ number_format($order->total_amount, 2) }}</td>
                        <td><span class="status">{{ $order->status }}</span></td>
                        <td>{{ optional($order->created_at)->format('d M Y') }}</td>
                        <td>
                            <a class="action-btn" href="{{ route('orders.show', $order->id) }}">
                                <i class="fa-solid fa-eye"></i> View
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="empty">No orders have been placed yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</section>

</main>

<footer>
    <i class="fa-solid fa-heart" style="color:#d4af37;"></i>
    &copy; {{ date('Y') }} StyleCart. All rights reserved.
</footer>

<script>
    const chartCanvas = document.getElementById('monthlySalesChart');

    if (chartCanvas && typeof Chart !== 'undefined') {
        new Chart(chartCanvas, {
            type: 'line',
            data: {
                labels: @json($monthlyLabels ?? []),
                datasets: [{
                    label: 'Monthly Sales (₹)',
                    data: @json($monthlySales ?? []),
                    borderColor: '#d4af37',
                    backgroundColor: 'rgba(212,175,55,0.15)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.35
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { labels: { color: '#ffffff' } }
                },
                scales: {
                    x: {
                        ticks: { color: '#aaaaaa' },
                        grid: { color: '#333333' }
                    },
                    y: {
                        beginAtZero: true,
                        ticks: { color: '#aaaaaa' },
                        grid: { color: '#333333' }
                    }
                }
            }
        });
    }
</script>

</body>
</html>
