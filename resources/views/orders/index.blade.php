<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>StyleCart | Order Management</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #111;
            color: #fff;
            font-family: Arial, sans-serif;
        }

        nav {
            background: #080808;
            border-bottom: 1px solid #d4af37;
            padding: 22px 6%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }

        .logo {
            color: #d4af37;
            font-size: 26px;
            font-weight: bold;
            letter-spacing: 2px;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin-left: 18px;
        }

        nav a:hover {
            color: #d4af37;
        }

        .container {
            width: 92%;
            max-width: 1250px;
            margin: 40px auto;
            animation: slideUp 0.7s ease;
        }

        h1 {
            color: #d4af37;
            margin-bottom: 10px;
        }

        .subtitle {
            color: #aaa;
            margin-bottom: 30px;
        }

        .alert {
            background: #173b24;
            border: 1px solid #278348;
            color: #a7f3b9;
            padding: 14px;
            margin-bottom: 20px;
            border-radius: 7px;
        }

        .table-wrapper {
            overflow-x: auto;
            background: #1b1b1b;
            border: 1px solid #403622;
            border-radius: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 850px;
        }

        th {
            background: #272216;
            color: #d4af37;
            text-align: left;
            padding: 17px;
        }

        td {
            padding: 16px;
            border-bottom: 1px solid #333;
        }

        tbody tr:hover {
            background: #24211a;
        }

        .status-form {
            display: flex;
            gap: 8px;
            align-items: center;
        }

        select {
            background: #111;
            color: white;
            border: 1px solid #6d5a28;
            border-radius: 5px;
            padding: 9px;
        }

        button, .btn {
            background: #d4af37;
            color: #111;
            padding: 10px 13px;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }

        button:hover, .btn:hover {
            background: #fff;
        }

        .view-btn {
            background: transparent;
            border: 1px solid #d4af37;
            color: #d4af37;
        }

        .view-btn:hover {
            background: #d4af37;
            color: #111;
        }

        .empty {
            padding: 30px;
            text-align: center;
            color: #aaa;
        }

        .pagination {
            padding: 20px;
        }

        .pagination nav {
            background: transparent;
            border: none;
            padding: 0;
        }

        .pagination a,
        .pagination span {
            margin: 3px;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(25px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 600px) {
            nav {
                align-items: flex-start;
                flex-direction: column;
            }

            nav a {
                margin: 0 12px 0 0;
                display: inline-block;
                margin-top: 10px;
            }
        }
    </style>
</head>

<body>

<nav>
    <div class="logo">STYLECART</div>

    <div>
        <a href="{{ route('dashboard') }}">Dashboard</a>
        <a href="{{ route('products.index') }}">Products</a>
        <a href="{{ route('categories.index') }}">Categories</a>
        <a href="{{ route('cart.index') }}">Cart</a>
    </div>
</nav>

<div class="container">

    <h1>Order Management</h1>
    <p class="subtitle">Manage customer orders and update their status.</p>

    @if(session('success'))
        <div class="alert">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert" style="background:#491b1b;border-color:#a33;color:#ffcaca;">
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <div class="table-wrapper">

        @if($orders->count())

            <table>
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer</th>
                        <th>Phone</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Update Status</th>
                        <th>Details</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($orders as $order)

                        <tr>
                            <td>#{{ $order->id }}</td>

                            <td>
                                {{ $order->customer_name }}
                            </td>

                            <td>
                                {{ $order->phone }}
                            </td>

                            <td>
                                ₹{{ number_format($order->total_amount, 2) }}
                            </td>

                            <td>
                                {{ $order->status }}
                            </td>

                            <td>
                                <form
                                    action="{{ route('orders.updateStatus', $order->id) }}"
                                    method="POST"
                                    class="status-form"
                                >
                                    @csrf
                                    @method('PATCH')

                                    <select name="status" required>
                                        @foreach([
                                            'Pending',
                                            'Processing',
                                            'Shipped',
                                            'Delivered',
                                            'Cancelled'
                                        ] as $status)

                                            <option
                                                value="{{ $status }}"
                                                @selected($order->status === $status)
                                            >
                                                {{ $status }}
                                            </option>

                                        @endforeach
                                    </select>

                                    <button type="submit">Update</button>
                                </form>
                            </td>

                            <td>
                                <a
                                    href="{{ route('orders.show', $order->id) }}"
                                    class="btn view-btn"
                                >
                                    View
                                </a>
                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>

            <div class="pagination">
                {{ $orders->links() }}
            </div>

        @else

            <div class="empty">
                <h3>No orders found</h3>
                <p>Customer orders will appear here.</p>
            </div>

        @endif

    </div>

</div>

</body>
</html>