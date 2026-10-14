<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>StyleCart - Shopping Cart</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f7f7fb;
            margin: 0;
            padding: 25px;
        }

        .container {
            max-width: 950px;
            margin: auto;
        }

        h1 {
            text-align: center;
            color: #ff4d6d;
        }

        .cart-item {
            display: flex;
            align-items: center;
            gap: 20px;
            background: white;
            padding: 20px;
            margin-bottom: 15px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.08);
        }

        .cart-image {
            width: 110px;
            height: 120px;
            object-fit: cover;
            border-radius: 8px;
        }

        .details {
            flex: 1;
        }

        .price {
            color: #ff4d6d;
            font-weight: bold;
        }

        input[type="number"] {
            width: 70px;
            padding: 8px;
        }

        button, .btn {
            padding: 10px 14px;
            border: none;
            border-radius: 6px;
            color: white;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }

        .update-btn {
            background: #6f42c1;
        }

        .remove-btn {
            background: #dc3545;
            margin-top: 10px;
        }

        .continue-btn {
            background: #ff4d6d;
        }

        .total-box {
            background: white;
            padding: 25px;
            border-radius: 12px;
            text-align: right;
        }

        .total {
            font-size: 26px;
            color: #ff4d6d;
            font-weight: bold;
        }

        .success {
            background: #d1e7dd;
            color: #0f5132;
            padding: 12px;
            margin-bottom: 15px;
            border-radius: 6px;
        }

        .error {
            background: #f8d7da;
            color: #842029;
            padding: 12px;
            margin-bottom: 15px;
            border-radius: 6px;
        }

        .empty {
            background: white;
            padding: 40px;
            text-align: center;
            border-radius: 12px;
        }

        @media (max-width: 600px) {
            body {
                padding: 12px;
            }

            .cart-item {
                flex-wrap: wrap;
            }

            .cart-image {
                width: 90px;
                height: 100px;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <h1>🛒 My Shopping Cart</h1>

    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="error">
            {{ session('error') }}
        </div>
    @endif

    @if(count($cart) > 0)

        @foreach($cart as $item)

            <div class="cart-item">

                @if(!empty($item['image']))
                    <img
                        src="{{ asset('storage/' . $item['image']) }}"
                        alt="{{ $item['name'] }}"
                        class="cart-image"
                    >
                @else
                    <div class="cart-image"
                         style="display:flex;align-items:center;justify-content:center;background:#f0f0f0;">
                        🛍️
                    </div>
                @endif

                <div class="details">

                    <h3>{{ $item['name'] }}</h3>

                    <p class="price">
                        ₹{{ number_format($item['price'], 2) }}
                    </p>

                    <form
                        action="{{ route('cart.update', $item['id']) }}"
                        method="POST"
                    >
                        @csrf
                        @method('PATCH')

                        <label>Quantity:</label>

                        <input
                            type="number"
                            name="quantity"
                            min="1"
                            value="{{ $item['quantity'] }}"
                            required
                        >

                        <button type="submit" class="update-btn">
                            Update
                        </button>
                    </form>

                    <p>
                        Subtotal:
                        <strong>
                            ₹{{ number_format($item['price'] * $item['quantity'], 2) }}
                        </strong>
                    </p>

                    <form
                        action="{{ route('cart.remove', $item['id']) }}"
                        method="POST"
                        onsubmit="return confirm('Remove this product?')"
                    >
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="remove-btn">
                            🗑️ Remove
                        </button>
                    </form>

                </div>

            </div>

        @endforeach

        <div class="total-box">

            <p>Total Amount</p>

            <div class="total">
                ₹{{ number_format($total, 2) }}
            </div>

            <br>

            <a href="{{ route('products.index') }}" class="btn continue-btn">
                ← Continue Shopping
            </a>

        </div>

    @else

        <div class="empty">
            <h2>Your Cart Is Empty 🛍️</h2>
            <p>Add products to your cart to get started.</p>

            <a href="{{ route('products.index') }}" class="btn continue-btn">
                Browse Products
            </a>
        </div>

    @endif

</div>

</body>
</html>