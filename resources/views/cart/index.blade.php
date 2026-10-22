<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Shopping Cart | StyleCart</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --black: #101010;
            --dark: #191919;
            --gold: #d4af37;
            --light-gold: #f5df8e;
            --white: #ffffff;
            --gray: #aaaaaa;
            --border: #353535;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: var(--black);
            color: var(--white);
            min-height: 100vh;
        }

        /* Navigation */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 7%;
            background: #080808;
            border-bottom: 1px solid #38301a;
            flex-wrap: wrap;
            gap: 15px;
        }

        .logo {
            font-size: 27px;
            font-weight: 700;
            letter-spacing: 2px;
            color: var(--gold);
        }

        .logo span {
            color: var(--white);
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 25px;
            flex-wrap: wrap;
        }

        .nav-links a {
            text-decoration: none;
            color: #dddddd;
            font-size: 13px;
            transition: 0.3s;
        }

        .nav-links a:hover,
        .nav-links a.active {
            color: var(--gold);
        }

        /* Container */
        .container {
            width: 90%;
            max-width: 1150px;
            margin: 45px auto;
            animation: slideUp 0.7s ease;
        }

        .page-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 30px;
            flex-wrap: wrap;
        }

        .page-heading h1 {
            font-size: 32px;
            font-weight: 600;
        }

        .page-heading h1 span {
            color: var(--gold);
        }

        .cart-count {
            color: var(--gray);
            font-size: 13px;
            margin-top: 7px;
        }

        /* Buttons */
        .btn {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            padding: 12px 18px;
            border-radius: 5px;
            text-decoration: none;
            font-family: inherit;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
            border: 1px solid var(--gold);
        }

        .btn-gold {
            background: var(--gold);
            color: #111111;
        }

        .btn-gold:hover {
            background: var(--light-gold);
            transform: translateY(-2px);
        }

        .btn-outline {
            color: var(--gold);
            background: transparent;
        }

        .btn-outline:hover {
            background: var(--gold);
            color: #111111;
        }

        .btn-remove {
            color: #ff7777;
            border-color: #713333;
            background: #261414;
            padding: 9px 12px;
        }

        .btn-remove:hover {
            background: #4b1c1c;
        }

        /* Messages */
        .alert {
            padding: 14px 18px;
            margin-bottom: 22px;
            border-radius: 6px;
            font-size: 13px;
        }

        .alert-success {
            color: #b8f5c7;
            background: #14291b;
            border: 1px solid #28653a;
        }

        .alert-error {
            color: #ffc2c2;
            background: #301818;
            border: 1px solid #783535;
        }

        /* Cart Layout */
        .cart-layout {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 320px;
            gap: 25px;
            align-items: start;
        }

        .cart-panel {
            background: linear-gradient(145deg, #202020, #151515);
            border: 1px solid var(--border);
            border-radius: 12px;
            overflow: hidden;
        }

        .panel-heading {
            padding: 22px 25px;
            border-bottom: 1px solid var(--border);
        }

        .panel-heading h2 {
            font-size: 17px;
            font-weight: 500;
        }

        .panel-heading h2 span {
            color: var(--gold);
        }

        /* Cart Item */
        .cart-item {
            display: grid;
            grid-template-columns: 100px minmax(0, 1fr) 125px;
            gap: 18px;
            align-items: center;
            padding: 22px 25px;
            border-bottom: 1px solid #303030;
            transition: background 0.3s;
        }

        .cart-item:hover {
            background: rgba(212, 175, 55, 0.035);
        }

        .product-image {
            width: 100px;
            height: 115px;
            object-fit: cover;
            border-radius: 7px;
            border: 1px solid #51451e;
            background: #252525;
        }

        .image-placeholder {
            width: 100px;
            height: 115px;
            border-radius: 7px;
            background: #252525;
            border: 1px solid #51451e;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 35px;
        }

        .product-info h3 {
            color: var(--light-gold);
            font-size: 16px;
            font-weight: 500;
            margin-bottom: 9px;
            overflow-wrap: anywhere;
        }

        .product-info .price {
            color: var(--gold);
            font-size: 15px;
            font-weight: 600;
        }

        .product-info .unit {
            color: var(--gray);
            font-size: 11px;
        }

        .quantity-form {
            margin-top: 14px;
        }

        .quantity-label {
            display: block;
            color: var(--gray);
            font-size: 11px;
            margin-bottom: 7px;
        }

        .quantity-controls {
            display: flex;
            gap: 7px;
        }

        .quantity-controls input {
            width: 65px;
            min-width: 0;
            padding: 9px;
            color: white;
            background: #101010;
            border: 1px solid #494949;
            border-radius: 4px;
            outline: none;
            font-family: inherit;
        }

        .quantity-controls input:focus {
            border-color: var(--gold);
        }

        .btn-update {
            background: transparent;
            border: 1px solid #66551f;
            color: var(--gold);
            padding: 8px 10px;
            border-radius: 4px;
            cursor: pointer;
            font-family: inherit;
            font-size: 11px;
            transition: 0.3s;
        }

        .btn-update:hover {
            background: var(--gold);
            color: #111;
        }

        .item-total {
            text-align: right;
        }

        .item-total small {
            display: block;
            color: var(--gray);
            font-size: 11px;
            margin-bottom: 7px;
        }

        .item-total strong {
            display: block;
            color: var(--gold);
            font-size: 16px;
            margin-bottom: 16px;
            overflow-wrap: anywhere;
        }

        .remove-form {
            display: inline-block;
        }

        /* Summary */
        .summary {
            background: linear-gradient(145deg, #202020, #151515);
            border: 1px solid #51451e;
            border-radius: 12px;
            padding: 25px;
            position: sticky;
            top: 20px;
        }

        .summary h2 {
            color: var(--gold);
            font-size: 19px;
            margin-bottom: 24px;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            gap: 15px;
            margin: 17px 0;
            color: #cccccc;
            font-size: 13px;
        }

        .summary-row strong {
            color: white;
            text-align: right;
        }

        .summary-divider {
            border: 0;
            border-top: 1px solid #414141;
            margin: 22px 0;
        }

        .grand-total {
            font-size: 15px;
            font-weight: 600;
        }

        .grand-total strong {
            color: var(--gold);
            font-size: 23px;
        }

        .checkout-btn {
            display: flex;
            width: 100%;
            margin-top: 25px;
            padding: 15px;
            font-size: 13px;
        }

        .continue-shopping {
            display: block;
            text-align: center;
            margin-top: 17px;
            color: var(--gray);
            font-size: 12px;
            text-decoration: none;
            transition: 0.3s;
        }

        .continue-shopping:hover {
            color: var(--gold);
        }

        .secure-note {
            text-align: center;
            color: #888888;
            font-size: 10px;
            line-height: 1.8;
            margin-top: 22px;
        }

        /* Empty Cart */
        .empty-cart {
            background: linear-gradient(145deg, #202020, #151515);
            border: 1px solid #51451e;
            border-radius: 14px;
            text-align: center;
            padding: 75px 20px;
            animation: slideUp 0.7s ease;
        }

        .empty-icon {
            width: 100px;
            height: 100px;
            border: 1px solid #66551f;
            border-radius: 50%;
            background: #211d10;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
            font-size: 42px;
            animation: float 3s ease-in-out infinite;
        }

        .empty-cart h2 {
            color: var(--gold);
            font-size: 24px;
            margin-bottom: 12px;
        }

        .empty-cart p {
            color: var(--gray);
            font-size: 13px;
            margin-bottom: 28px;
            line-height: 1.8;
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 25px;
            margin-top: 65px;
            border-top: 1px solid #292929;
            color: #777;
            font-size: 11px;
        }

        footer span {
            color: var(--gold);
        }

        /* Animations */
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

        @keyframes float {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-8px);
            }
        }

        /* Responsive */
        @media (max-width: 900px) {
            .cart-layout {
                grid-template-columns: 1fr;
            }

            .summary {
                position: static;
            }
        }

        @media (max-width: 600px) {
            .navbar {
                padding: 18px 5%;
            }

            .logo {
                font-size: 22px;
            }

            .nav-links {
                gap: 15px;
            }

            .container {
                width: 94%;
                margin: 30px auto;
            }

            .page-heading h1 {
                font-size: 26px;
            }

            .cart-item {
                grid-template-columns: 75px minmax(0, 1fr);
                gap: 13px;
                padding: 18px 13px;
            }

            .product-image,
            .image-placeholder {
                width: 75px;
                height: 95px;
            }

            .product-info h3 {
                font-size: 14px;
            }

            .item-total {
                grid-column: 2;
                text-align: left;
                border-top: 1px solid #303030;
                padding-top: 12px;
            }

            .item-total strong {
                display: inline-block;
                margin-right: 12px;
                margin-bottom: 10px;
            }

            .panel-heading {
                padding: 18px;
            }

            .empty-cart {
                padding: 55px 18px;
            }
        }
    </style>
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar">
        <div class="logo">
            STYLE<span>CART</span>
        </div>

        <div class="nav-links">
            <a href="{{ route('products.index') }}">Products</a>

            <a href="{{ route('categories.index') }}">Categories</a>

            <a href="{{ route('cart.index') }}" class="active">
                My Cart
            </a>

            <a href="{{ route('dashboard') }}">Dashboard</a>
        </div>
    </nav>

    <main class="container">

        <!-- Heading -->
        <div class="page-heading">
            <div>
                <h1>My Shopping <span>Cart</span></h1>

                <p class="cart-count">
                    Review your items before checkout.
                </p>
            </div>

            <a href="{{ route('products.index') }}" class="btn btn-outline">
                ← Continue Shopping
            </a>
        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div class="alert alert-success">
                ✓ {{ session('success') }}
            </div>
        @endif

        <!-- Error Message -->
        @if(session('error'))
            <div class="alert alert-error">
                {{ session('error') }}
            </div>
        @endif

        <!-- Validation Messages -->
        @if($errors->any())
            <div class="alert alert-error">
                <strong>Please check:</strong>

                <ul style="padding-left: 20px; margin-top: 8px;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(count($cart) > 0)

            <div class="cart-layout">

                <!-- Cart Items -->
                <section class="cart-panel">

                    <div class="panel-heading">
                        <h2>
                            Your Items
                            <span>({{ count($cart) }})</span>
                        </h2>
                    </div>

                    @foreach($cart as $id => $item)

                        <article class="cart-item">

                            <!-- Product Image -->
                            <div>
                                @if(!empty($item['image']))
                                    <img
                                        class="product-image"
                                        src="{{ \Illuminate\Support\Str::startsWith($item['image'], ['http://', 'https://']) ? $item['image'] : asset('storage/' . $item['image']) }}"
                                        alt="{{ $item['name'] }}"
                                        onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                                    >

                                    <div class="image-placeholder" style="display:none;">
                                        👗
                                    </div>
                                @else
                                    <div class="image-placeholder">
                                        👗
                                    </div>
                                @endif
                            </div>

                            <!-- Product Details -->
                            <div class="product-info">

                                <h3>{{ $item['name'] }}</h3>

                                <div class="price">
                                    ₹{{ number_format((float) $item['price'], 2) }}
                                </div>

                                <div class="unit">
                                    Price per item
                                </div>

                                <!-- Update Quantity -->
                                <form
                                    action="{{ route('cart.update', $id) }}"
                                    method="POST"
                                    class="quantity-form"
                                >
                                    @csrf
                                    @method('PATCH')

                                    <label class="quantity-label"
                                           for="quantity-{{ $id }}">
                                        Quantity
                                    </label>

                                    <div class="quantity-controls">
                                        <input
                                            type="number"
                                            id="quantity-{{ $id }}"
                                            name="quantity"
                                            value="{{ $item['quantity'] }}"
                                            min="1"
                                            required
                                        >

                                        <button type="submit"
                                                class="btn-update">
                                            Update
                                        </button>
                                    </div>
                                </form>

                            </div>

                            <!-- Item Total -->
                            <div class="item-total">

                                <small>Subtotal</small>

                                <strong>
                                    ₹{{ number_format((float) $item['price'] * (int) $item['quantity'], 2) }}
                                </strong>

                                <form
                                    action="{{ route('cart.remove', $id) }}"
                                    method="POST"
                                    class="remove-form"
                                    onsubmit="return confirm('Remove this product from your cart?');"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-remove">
                                        ✕ Remove
                                    </button>
                                </form>

                            </div>

                        </article>

                    @endforeach

                </section>

                <!-- Order Summary -->
                <aside class="summary">

                    <h2>Order Summary</h2>

                    <div class="summary-row">
                        <span>Items</span>

                        <strong>{{ count($cart) }}</strong>
                    </div>

                    <div class="summary-row">
                        <span>Subtotal</span>

                        <strong>
                            ₹{{ number_format((float) $total, 2) }}
                        </strong>
                    </div>

                    <div class="summary-row">
                        <span>Shipping</span>

                        <strong style="color: var(--gold);">
                            FREE
                        </strong>
                    </div>

                    <hr class="summary-divider">

                    <div class="summary-row grand-total">
                        <span>Total</span>

                        <strong>
                            ₹{{ number_format((float) $total, 2) }}
                        </strong>
                    </div>

                    <a href="{{ route('checkout.index') }}"
                       class="btn btn-gold checkout-btn">
                        Proceed to Checkout →
                    </a>

                    <a href="{{ route('products.index') }}"
                       class="continue-shopping">
                        ← Continue Shopping
                    </a>

                    <p class="secure-note">
                        ✦ Thank you for choosing StyleCart.<br>
                        Your fashion journey starts here.
                    </p>

                </aside>

            </div>

        @else

            <!-- Empty Cart -->
            <section class="empty-cart">

                <div class="empty-icon">
                    🛒
                </div>

                <h2>Your Shopping Cart Is Empty</h2>

                <p>
                    Looks like you haven't added anything yet.<br>
                    Explore our collection and find your next favourite style.
                </p>

                <a href="{{ route('products.index') }}"
                   class="btn btn-gold">
                    ✦ Shop Now
                </a>

            </section>

        @endif

    </main>

    <footer>
        © {{ date('Y') }} <span>StyleCart</span>.
        Fashion that defines you.
    </footer>

</body>
</html>