<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Order Successful | StyleCart</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        :root {
            --gold: #d4af37;
            --gold-light: #f5d76e;
            --black: #080808;
            --card: #141414;
            --border: rgba(212, 175, 55, 0.35);
            --text: #ffffff;
            --muted: #b5b5b5;
        }

        body {
            font-family: Arial, sans-serif;
            background:
                radial-gradient(
                    circle at top,
                    rgba(212, 175, 55, 0.10),
                    transparent 40%
                ),
                var(--black);
            color: var(--text);
            min-height: 100vh;
            padding: 40px 15px;
        }

        .container {
            max-width: 780px;
            margin: auto;
            background: linear-gradient(
                145deg,
                #181818,
                #0d0d0d
            );
            padding: 40px;
            border: 1px solid var(--border);
            border-radius: 18px;
            box-shadow:
                0 0 25px rgba(212, 175, 55, 0.08),
                0 15px 45px rgba(0, 0, 0, 0.5);
            animation: slideUp 0.7s ease;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(35px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .success-icon {
            width: 95px;
            height: 95px;
            margin: 0 auto 25px;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 2px solid var(--gold);
            border-radius: 50%;
            color: var(--gold-light);
            font-size: 55px;
            font-weight: bold;
            box-shadow:
                0 0 15px rgba(212, 175, 55, 0.2),
                inset 0 0 15px rgba(212, 175, 55, 0.08);
            animation: successPop 0.6s ease 0.2s both;
        }

        @keyframes successPop {
            from {
                opacity: 0;
                transform: scale(0.5);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        h1 {
            text-align: center;
            color: var(--gold);
            font-size: clamp(25px, 5vw, 36px);
            margin-bottom: 15px;
        }

        .message {
            text-align: center;
            color: var(--muted);
            line-height: 1.8;
            margin-bottom: 30px;
        }

        .brand {
            text-align: center;
            color: var(--gold);
            letter-spacing: 5px;
            font-size: 12px;
            margin-bottom: 25px;
        }

        .gold-line {
            width: 100%;
            height: 2px;
            background: linear-gradient(
                90deg,
                transparent,
                var(--gold),
                var(--gold-light),
                var(--gold),
                transparent
            );
            margin: 25px 0;
            box-shadow: 0 0 10px rgba(212, 175, 55, 0.2);
        }

        .details {
            background: rgba(255, 255, 255, 0.025);
            padding: 25px;
            border: 1px solid var(--border);
            border-radius: 12px;
        }

        h2 {
            color: var(--gold);
            font-size: 21px;
            margin-bottom: 20px;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 20px;
            padding: 13px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.07);
        }

        .info-label {
            color: var(--muted);
            flex-shrink: 0;
        }

        .info-value {
            color: var(--text);
            text-align: right;
            overflow-wrap: anywhere;
        }

        .order-id {
            color: var(--gold-light);
            font-weight: bold;
        }

        .status {
            color: #6ee7a0;
            font-weight: bold;
        }

        .section-title {
            margin-top: 30px;
            margin-bottom: 10px;
        }

        .product {
            display: flex;
            justify-content: space-between;
            gap: 15px;
            padding: 18px 0;
            border-bottom: 1px solid rgba(212, 175, 55, 0.15);
            transition: background 0.3s ease;
        }

        .product:hover {
            background: rgba(212, 175, 55, 0.045);
        }

        .product-name {
            color: var(--gold-light);
            font-weight: bold;
            margin-bottom: 8px;
        }

        .product-info {
            color: var(--muted);
            font-size: 14px;
            line-height: 1.9;
        }

        .product-subtotal {
            color: var(--gold);
            font-weight: bold;
            white-space: nowrap;
            align-self: center;
        }

        .total-box {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-top: 25px;
            padding: 20px;
            background: rgba(212, 175, 55, 0.07);
            border: 1px solid var(--border);
            border-radius: 10px;
        }

        .total-label {
            color: var(--text);
            font-size: 18px;
            font-weight: bold;
        }

        .total {
            color: var(--gold-light);
            font-size: 25px;
            font-weight: bold;
        }

        .center {
            text-align: center;
            margin-top: 30px;
        }

        .btn {
            display: inline-block;
            padding: 14px 28px;
            background: linear-gradient(
                135deg,
                var(--gold-light),
                var(--gold)
            );
            color: #111;
            text-decoration: none;
            border: 1px solid var(--gold);
            border-radius: 7px;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .btn:hover {
            background: transparent;
            color: var(--gold-light);
            box-shadow: 0 0 20px rgba(212, 175, 55, 0.3);
            transform: translateY(-3px);
        }

        .footer {
            text-align: center;
            margin-top: 25px;
            color: #777;
            font-size: 12px;
            letter-spacing: 1px;
        }

        @media (max-width: 600px) {
            body {
                padding: 20px 12px;
            }

            .container {
                padding: 22px 16px;
            }

            .details {
                padding: 16px;
            }

            .info-row {
                flex-direction: column;
                gap: 6px;
            }

            .info-value {
                text-align: left;
            }

            .product {
                flex-direction: column;
            }

            .product-subtotal {
                align-self: flex-start;
            }

            .total {
                font-size: 21px;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="brand">STYLECART · LUXURY FASHION</div>

    <div class="success-icon">✓</div>

    <h1>Order Placed Successfully!</h1>

    <p class="message">
        Thank you for shopping with StyleCart.<br>
        Your order has been received successfully.
    </p>

    <div class="gold-line"></div>

    <div class="details">

        <h2>Order Details</h2>

        <div class="info-row">
            <span class="info-label">Order ID</span>
            <span class="info-value order-id">
                #{{ $order->id }}
            </span>
        </div>

        <div class="info-row">
            <span class="info-label">Customer Name</span>
            <span class="info-value">
                {{ $order->customer_name }}
            </span>
        </div>

        <div class="info-row">
            <span class="info-label">Phone</span>
            <span class="info-value">
                {{ $order->phone }}
            </span>
        </div>

        <div class="info-row">
            <span class="info-label">Delivery Address</span>
            <span class="info-value">
                {{ $order->address }}
            </span>
        </div>

        <div class="info-row">
            <span class="info-label">Order Status</span>
            <span class="info-value status">
                {{ $order->status }}
            </span>
        </div>

        <h2 class="section-title">Products Ordered</h2>

        @foreach ($order->items as $item)

            <div class="product">

                <div>
                    <div class="product-name">
                        {{ $item->product_name }}
                    </div>

                    <div class="product-info">
                        Price: ₹{{ number_format($item->price, 2) }}
                        <br>
                        Quantity: {{ $item->quantity }}
                    </div>
                </div>

                <div class="product-subtotal">
                    ₹{{ number_format($item->subtotal, 2) }}
                </div>

            </div>

        @endforeach

        <div class="total-box">
            <span class="total-label">Total Amount</span>

            <span class="total">
                ₹{{ number_format($order->total_amount, 2) }}
            </span>
        </div>

    </div>

    <div class="center">

        <a href="{{ route('products.index') }}" class="btn">
            ← Continue Shopping
        </a>

    </div>

    <div class="footer">
        THANK YOU FOR CHOOSING STYLECART
    </div>

</div>

</body>
</html>