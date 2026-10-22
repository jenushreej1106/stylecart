<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>StyleCart | Order Details</title>

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
        }

        .logo {
            color: #d4af37;
            font-size: 26px;
            font-weight: bold;
            letter-spacing: 2px;
        }

        nav a {
            color: #fff;
            text-decoration: none;
        }

        nav a:hover {
            color: #d4af37;
        }

        .container {
            width: 90%;
            max-width: 1000px;
            margin: 40px auto;
            animation: slideUp 0.6s ease;
        }

        h1, h2 {
            color: #d4af37;
            margin-bottom: 20px;
        }

        .card {
            background: #1b1b1b;
            border: 1px solid #403622;
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 25px;
        }

        .details {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .detail p {
            color: #aaa;
            margin-bottom: 7px;
        }

        .detail strong {
            font-size: 16px;
            overflow-wrap: anywhere;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 450px;
        }

        th {
            color: #d4af37;
            background: #272216;
            text-align: left;
        }

        th, td {
            padding: 15px;
            border-bottom: 1px solid #333;
        }

        .total {
            text-align: right;
            color: #d4af37;
            font-size: 23px;
            font-weight: bold;
            margin-top: 20px;
        }

        .btn {
            display: inline-block;
            padding: 12px 20px;
            background: #d4af37;
            color: #111;
            text-decoration: none;
            border-radius: 6px;
            font-weight: bold;
        }

        .btn:hover {
            background: #fff;
        }

        .empty {
            color: #aaa;
            padding: 20px 0;
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
            .details {
                grid-template-columns: 1fr;
            }

            nav {
                gap: 15px;
                flex-wrap: wrap;
            }
        }
    </style>
</head>

<body>

<nav>
    <div class="logo">STYLECART</div>

    <a href="{{ route('orders.index') }}">← Back to Orders</a>
</nav>

<div class="container">

    <h1>Order Details #{{ $order->id }}</h1>

    <div class="card">
        <h2>Customer Information</h2>

        <div class="details">

            <div class="detail">
                <p>Customer Name</p>
                <strong>{{ $order->customer_name }}</strong>
            </div>

            <div class="detail">
                <p>Phone Number</p>
                <strong>{{ $order->phone }}</strong>
            </div>

            <div class="detail">
                <p>Delivery Address</p>
                <strong>{{ $order->address }}</strong>
            </div>

            <div class="detail">
                <p>Order Status</p>
                <strong>{{ $order->status }}</strong>
            </div>

            <div class="detail">
                <p>Order Date</p>
                <strong>{{ $order->created_at->format('d M Y, h:i A') }}</strong>
            </div>

        </div>
    </div>

    <div class="card">

        <h2>Ordered Products</h2>

        @if($order->items->count())

            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($order->items as $item)
                            <tr>
                                <td>{{ $item->product_name }}</td>

                                <td>
                                    ₹{{ number_format($item->price, 2) }}
                                </td>

                                <td>{{ $item->quantity }}</td>

                                <td>
                                    ₹{{ number_format($item->subtotal, 2) }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        @else

            <p class="empty">No product items found for this order.</p>

        @endif

        <div class="total">
            Total: ₹{{ number_format($order->total_amount, 2) }}
        </div>

    </div>

    <a href="{{ route('orders.index') }}" class="btn">
        Back to Orders
    </a>

</div>

</body>
</html>