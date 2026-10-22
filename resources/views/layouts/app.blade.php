<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'StyleCart | Luxury Fashion')</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f8f6f1;
            color: #222;
            min-height: 100vh;
        }

        /* Announcement */
        .announcement {
            background: #d4af37;
            color: #111;
            text-align: center;
            padding: 10px;
            font-size: 12px;
            font-weight: bold;
            letter-spacing: 2px;
        }

        /* Header */
        .header {
            background: #080808;
            color: white;
            min-height: 80px;
            padding: 20px 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .logo {
            color: #d4af37;
            font-family: Georgia, serif;
            font-size: 32px;
            font-weight: bold;
            text-decoration: none;
        }

        .logo span {
            color: white;
        }

        .header-text {
            color: #ccc;
            font-size: 13px;
        }

        /* Navigation */
        .navbar {
            background: #080808;
            border-top: 1px solid #242424;
            border-bottom: 2px solid #d4af37;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            gap: 8px;
            padding: 15px 12px;
        }

        .navbar a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 12px 14px;
            color: #fff;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            border: 1px solid transparent;
            border-radius: 6px;
            transition: all 0.3s ease;
        }

        /* Icons */
        .navbar a i {
            color: #d4af37;
            font-size: 16px;
            width: 18px;
            text-align: center;
            transition: all 0.3s ease;
        }

        /* Hover */
        .navbar a:hover {
            color: #111;
            background: #d4af37;
            border-color: #d4af37;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(212, 175, 55, 0.25);
        }

        .navbar a:hover i {
            color: #111;
        }

        /* Active Link */
        .navbar a.active {
            color: #d4af37;
            border-color: #d4af37;
        }

        .navbar a.active i {
            color: #d4af37;
        }

        .navbar a.active:hover,
        .navbar a.active:hover i {
            color: #111;
        }

        /* Main Content */
        .main-content {
            width: 100%;
            max-width: 1450px;
            margin: auto;
            padding: 30px 5%;
            min-height: 60vh;
        }

        /* Messages */
        .alert-success {
            background: #e5f7e8;
            color: #176b2c;
            border-left: 5px solid #28a745;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .alert-error {
            background: #fde8e8;
            color: #a51d1d;
            border-left: 5px solid #dc3545;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        /* Footer */
        .footer {
            background: #080808;
            color: #ccc;
            text-align: center;
            padding: 30px 15px;
            margin-top: 40px;
            border-top: 2px solid #d4af37;
        }

        .footer-logo {
            color: #d4af37;
            font-family: Georgia, serif;
            font-size: 27px;
            font-weight: bold;
            margin-bottom: 12px;
        }

        .footer-icons {
            margin: 15px 0;
        }

        .footer-icons i {
            color: #d4af37;
            font-size: 20px;
            margin: 0 9px;
        }

        .footer p {
            font-size: 13px;
            line-height: 1.8;
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .header {
                justify-content: center;
                text-align: center;
            }

            .logo {
                font-size: 27px;
            }

            .navbar {
                gap: 5px;
                padding: 12px 6px;
            }

            .navbar a {
                padding: 10px;
                font-size: 12px;
            }

            .navbar a i {
                font-size: 14px;
            }

            .main-content {
                padding: 20px 12px;
            }
        }

        @media (max-width: 420px) {
            .navbar a {
                padding: 8px;
                font-size: 11px;
                gap: 5px;
            }

            .navbar a i {
                font-size: 13px;
            }
        }
    </style>
</head>

<body>

    <!-- Announcement Bar -->
    <div class="announcement">
        <i class="fa-solid fa-star"></i>
        PREMIUM FASHION COLLECTION
        <i class="fa-solid fa-star"></i>
    </div>

    <!-- Header -->
    <header class="header">

        <a href="{{ route('products.index') }}" class="logo">
            Style<span>Cart</span>.
        </a>

        <div class="header-text">
            Your Style, Your Story.
            <i class="fa-regular fa-heart"></i>
        </div>

    </header>

    <!-- Navigation -->
    <nav class="navbar">

        <a href="{{ route('products.index') }}"
           class="{{ request()->routeIs('products.index') ? 'active' : '' }}">
            <i class="fa-solid fa-house"></i>
            <span>Home</span>
        </a>

        <a href="{{ route('categories.index') }}"
           class="{{ request()->routeIs('categories.*') ? 'active' : '' }}">
            <i class="fa-solid fa-layer-group"></i>
            <span>Categories</span>
        </a>

        <a href="{{ route('wishlist.index') }}"
           class="{{ request()->routeIs('wishlist.*') ? 'active' : '' }}">
            <i class="fa-regular fa-heart"></i>
            <span>Wishlist</span>
        </a>

        <a href="{{ route('cart.index') }}"
           class="{{ request()->routeIs('cart.*') ? 'active' : '' }}">
            <i class="fa-solid fa-cart-shopping"></i>
            <span>Cart</span>
        </a>

        <a href="{{ route('orders.index') }}"
           class="{{ request()->routeIs('orders.*') || request()->routeIs('my-orders.*') ? 'active' : '' }}">
            <i class="fa-solid fa-box-open"></i>
            <span>Orders</span>
        </a>

        <a href="{{ route('dashboard') }}"
           class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <i class="fa-solid fa-chart-line"></i>
            <span>Dashboard</span>
        </a>

        <a href="{{ route('products.create') }}"
           class="{{ request()->routeIs('products.create') ? 'active' : '' }}">
            <i class="fa-solid fa-circle-plus"></i>
            <span>Add Product</span>
        </a>

    </nav>

    <!-- Main Content -->
    <main class="main-content">

        @if(session('success'))
            <div class="alert-success">
                <i class="fa-solid fa-circle-check"></i>
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert-error">
                <i class="fa-solid fa-circle-exclamation"></i>
                {{ session('error') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert-error">
                <strong>
                    <i class="fa-solid fa-triangle-exclamation"></i>
                    Please check the following:
                </strong>

                <ul style="margin: 10px 0 0 25px;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')

    </main>

    <!-- Footer -->
    <footer class="footer">

        <div class="footer-logo">
            StyleCart.
        </div>

        <div class="footer-icons">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-shirt"></i>
            <i class="fa-solid fa-bag-shopping"></i>
            <i class="fa-regular fa-heart"></i>
        </div>

        <p>Discover Your Style. Define Your Fashion.</p>

        <p>
            &copy; {{ date('Y') }} StyleCart. All Rights Reserved.
        </p>

    </footer>

</body>
</html>