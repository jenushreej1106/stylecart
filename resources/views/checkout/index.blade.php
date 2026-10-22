<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Checkout | StyleCart</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;600;700&family=Poppins:wght@300;400;500;600&display=swap"
          rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: #090909;
            color: #f5f5f5;
        }

        .navbar {
            background: #000;
            border-bottom: 1px solid #c9a227;
            padding: 18px 7%;
        }

        .brand {
            font-family: 'Playfair Display', serif;
            font-size: 28px;
            font-weight: 700;
            color: #d4af37;
            text-decoration: none;
            letter-spacing: 2px;
        }

        .brand:hover {
            color: #f5d76e;
        }

        .back-link {
            color: #d4af37;
            text-decoration: none;
            font-size: 14px;
        }

        .back-link:hover {
            color: white;
        }

        .checkout-wrapper {
            max-width: 1150px;
            margin: 55px auto;
            padding: 0 20px;
            animation: slideUp 0.8s ease;
        }

        .page-title {
            font-family: 'Playfair Display', serif;
            color: #d4af37;
            font-size: 42px;
            margin-bottom: 10px;
        }

        .page-subtitle {
            color: #aaa;
            margin-bottom: 35px;
        }

        .checkout-card {
            background: #141414;
            border: 1px solid #302817;
            border-radius: 16px;
            padding: 30px;
            height: 100%;
            box-shadow: 0 10px 35px rgba(0, 0, 0, 0.35);
            transition: transform 0.3s ease, border-color 0.3s ease;
        }

        .checkout-card:hover {
            border-color: #c9a227;
            transform: translateY(-3px);
        }

        .section-title {
            font-family: 'Playfair Display', serif;
            color: #d4af37;
            font-size: 25px;
            margin-bottom: 25px;
        }

        .form-label {
            color: #ddd;
            font-size: 14px;
            margin-bottom: 8px;
        }

        .form-control {
            background: #202020;
            color: #fff;
            border: 1px solid #444;
            border-radius: 8px;
            padding: 13px;
        }

        .form-control:focus {
            background: #202020;
            color: #fff;
            border-color: #d4af37;
            box-shadow: 0 0 0 0.2rem rgba(212, 175, 55, 0.15);
        }

        .form-control::placeholder {
            color: #888;
        }

        textarea.form-control {
            resize: vertical;
            min-height: 120px;
        }

        .payment-option {
            display: block;
            padding: 18px;
            background: #202020;
            border: 1px solid #444;
            border-radius: 10px;
            margin-bottom: 15px;
            cursor: pointer;
            transition: 0.3s ease;
        }

        .payment-option:hover {
            border-color: #d4af37;
        }

        .payment-option:has(input:checked) {
            border-color: #d4af37;
            background: #292315;
        }

        .payment-option input {
            accent-color: #d4af37;
            margin-right: 10px;
        }

        .payment-name {
            font-weight: 600;
            color: #fff;
        }

        .payment-description {
            display: block;
            margin: 8px 0 0 27px;
            font-size: 12px;
            color: #aaa;
        }

        .product-row {
            display: flex;
            justify-content: space-between;
            gap: 15px;
            padding: 16px 0;
            border-bottom: 1px solid #333;
        }

        .product-name {
            color: #eee;
            font-size: 14px;
        }

        .product-quantity {
            color: #999;
            font-size: 12px;
            margin-top: 5px;
        }

        .product-price {
            color: #d4af37;
            font-weight: 500;
            white-space: nowrap;
        }

        .total-row {
            display: flex;
            justify-content: space-between;
            margin-top: 25px;
            font-size: 19px;
            font-weight: 600;
        }

        .total-amount {
            color: #d4af37;
        }

        .place-order-btn {
            display: block;
            width: 100%;
            margin-top: 30px;
            padding: 15px;
            border: none;
            border-radius: 8px;
            background: linear-gradient(135deg, #d4af37, #f5d76e);
            color: #111;
            font-size: 15px;
            font-weight: 700;
            letter-spacing: 1px;
            cursor: pointer;
            transition: 0.3s ease;
        }

        .place-order-btn:hover {
            background: linear-gradient(135deg, #f5d76e, #d4af37);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(212, 175, 55, 0.2);
        }

        .secure-message {
            text-align: center;
            color: #999;
            font-size: 12px;
            margin-top: 15px;
        }

        .alert {
            border-radius: 10px;
        }

        .alert-danger {
            background: #351818;
            border-color: #743333;
            color: #ffbaba;
        }

        .alert-success {
            background: #17351f;
            border-color: #2f7540;
            color: #b6f5c4;
        }

        footer {
            text-align: center;
            padding: 25px 15px;
            color: #888;
            border-top: 1px solid #292929;
            margin-top: 60px;
            font-size: 13px;
        }

        footer span {
            color: #d4af37;
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

        @media (max-width: 768px) {
            .checkout-wrapper {
                margin-top: 35px;
            }

            .page-title {
                font-size: 32px;
            }

            .checkout-card {
                padding: 22px;
            }

            .order-summary {
                margin-top: 25px;
            }
        }
    </style>
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar">
        <div class="container-fluid">
            <a href="{{ route('products.index') }}" class="brand">
                STYLECART
            </a>

            <a href="{{ route('cart.index') }}" class="back-link">
                ← Back to Cart
            </a>
        </div>
    </nav>

    <!-- Checkout -->
    <main class="checkout-wrapper">

        <h1 class="page-title">Secure Checkout</h1>

        <p class="page-subtitle">
            Complete your details and place your fashion order.
        </p>

        <!-- Success Message -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Error Message -->
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <!-- Validation Errors -->
        @if($errors->any())
            <div class="alert alert-danger">
                <strong>Please correct the following:</strong>

                <ul class="mb-0 mt-2">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('checkout.store') }}" method="POST">
            @csrf

            <div class="row">

                <!-- Customer Details -->
                <div class="col-lg-7">

                    <div class="checkout-card">

                        <h2 class="section-title">
                            Customer Details
                        </h2>

                        <div class="mb-4">
                            <label for="customer_name" class="form-label">
                                Full Name
                            </label>

                            <input
                                type="text"
                                id="customer_name"
                                name="customer_name"
                                class="form-control"
                                placeholder="Enter your full name"
                                value="{{ old('customer_name') }}"
                                maxlength="255"
                                autocomplete="name"
                                required
                            >
                        </div>

                        <div class="mb-4">
                            <label for="phone" class="form-label">
                                Phone Number
                            </label>

                            <input
                                type="tel"
                                id="phone"
                                name="phone"
                                class="form-control"
                                placeholder="Enter your phone number"
                                value="{{ old('phone') }}"
                                maxlength="20"
                                autocomplete="tel"
                                required
                            >
                        </div>

                        <div class="mb-4">
                            <label for="address" class="form-label">
                                Delivery Address
                            </label>

                            <textarea
                                id="address"
                                name="address"
                                class="form-control"
                                placeholder="Enter your complete delivery address"
                                autocomplete="street-address"
                                required
                            >{{ old('address') }}</textarea>
                        </div>

                        <!-- Payment Method -->
                        <h2 class="section-title mt-4">
                            Payment Method
                        </h2>

                        <label class="payment-option">
                            <input
                                type="radio"
                                name="payment_method"
                                value="COD"
                                {{ old('payment_method', 'COD') === 'COD' ? 'checked' : '' }}
                                required
                            >

                            <span class="payment-name">
                                💵 Cash on Delivery (COD)
                            </span>

                            <span class="payment-description">
                                Pay when your order is delivered.
                            </span>
                        </label>

                        <label class="payment-option">
                            <input
                                type="radio"
                                name="payment_method"
                                value="GPay"
                                {{ old('payment_method') === 'GPay' ? 'checked' : '' }}
                            >

                            <span class="payment-name">
                                📱 Google Pay (GPay)
                            </span>

                            <span class="payment-description">
                                Google Pay option selected. Online payment
                                must be completed through a properly
                                integrated payment gateway.
                            </span>
                        </label>

                    </div>

                </div>

                <!-- Order Summary -->
                <div class="col-lg-5 order-summary">

                    <div class="checkout-card">

                        <h2 class="section-title">
                            Order Summary
                        </h2>

                        @php
                            $displayTotal = 0;
                        @endphp

                        @forelse($cart as $id => $item)

                            @php
                                $quantity = (int) ($item['quantity'] ?? 1);
                                $price = (float) ($item['price'] ?? 0);
                                $subtotal = $price * $quantity;
                                $displayTotal += $subtotal;
                            @endphp

                            <div class="product-row">

                                <div>
                                    <div class="product-name">
                                        {{ $item['name'] ?? 'Product' }}
                                    </div>

                                    <div class="product-quantity">
                                        Quantity: {{ $quantity }}
                                    </div>
                                </div>

                                <div class="product-price">
                                    ₹{{ number_format($subtotal, 2) }}
                                </div>

                            </div>

                        @empty

                            <p class="text-secondary">
                                Your cart is empty.
                            </p>

                        @endforelse

                        <div class="total-row">
                            <span>Total Amount</span>

                            <span class="total-amount">
                                ₹{{ number_format((float) ($total ?? $displayTotal), 2) }}
                            </span>
                        </div>

                        <button type="submit" class="place-order-btn">
                            PLACE ORDER →
                        </button>

                        <p class="secure-message">
                            🔒 Your order details are submitted securely.
                        </p>

                    </div>

                </div>

            </div>
        </form>

    </main>

    <!-- Footer -->
    <footer>
        © {{ date('Y') }} <span>STYLECART</span> — Luxury Fashion Shopping.
    </footer>

</body>
</html>