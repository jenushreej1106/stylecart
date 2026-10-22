<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>StyleCart | Luxury Fashion</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">

    <style>
        :root {
            --gold: #d4af37;
            --gold-light: #fff2a8;
            --black: #080808;
            --card: #141414;
            --muted: #aaa;
            --border: #38301b;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            background: var(--black);
            color: white;
            font-family: 'Poppins', sans-serif;
        }

        a {
            text-decoration: none;
        }

        button,
        input,
        select {
            font: inherit;
        }

        button,
        a {
            -webkit-tap-highlight-color: transparent;
        }

        /* NAVBAR */

        .navbar {
            min-height: 78px;
            padding: 18px 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            background: #090909;
            border-bottom: 1px solid var(--border);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .logo {
            color: white;
            font-family: 'Playfair Display', serif;
            font-size: 30px;
            font-weight: 700;
            white-space: nowrap;
        }

        .logo span {
            color: var(--gold);
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 22px;
            flex-wrap: wrap;
        }

        .nav-links a {
            position: relative;
            color: #ddd;
            font-size: 12px;
            transition: color .3s, text-shadow .3s;
        }

        .nav-links a::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: -5px;
            width: 100%;
            height: 1px;
            background: var(--gold);
            transform: scaleX(0);
            transition: transform .3s;
        }

        .nav-links a:hover {
            color: var(--gold-light);
            text-shadow: 0 0 10px #d4af3766;
        }

        .nav-links a:hover::after {
            transform: scaleX(1);
        }

        .gold-line {
            height: 2px;
            width: 100%;
            background: linear-gradient(
                90deg,
                transparent,
                var(--gold),
                var(--gold-light),
                var(--gold),
                transparent
            );
            background-size: 200% 100%;
            animation: goldShine 4s linear infinite;
        }

        @keyframes goldShine {
            from {
                background-position: 200% 0;
            }

            to {
                background-position: -200% 0;
            }
        }

        /* HERO SLIDER */

        .hero {
            position: relative;
            height: 510px;
            overflow: hidden;
            background: #111;
        }

        .hero-slide {
            position: absolute;
            inset: 0;
            display: flex;
            align-items: center;
            padding: 60px 9%;
            background-size: cover;
            background-position: center;
            opacity: 0;
            visibility: hidden;
            transition: opacity 1s ease, visibility 1s ease;
        }

        .hero-slide.active {
            opacity: 1;
            visibility: visible;
            z-index: 1;
        }

        .hero-slide::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(
                90deg,
                rgba(0, 0, 0, .94) 0%,
                rgba(0, 0, 0, .70) 48%,
                rgba(0, 0, 0, .15) 100%
            );
        }

        .slide-1 {
            background-image: url('https://images.unsplash.com/photo-1483985988355-763728e1935b?auto=format&fit=crop&w=2000&q=85');
        }

        .slide-2 {
            background-image: url('https://images.unsplash.com/photo-1485230895905-ec40ba36b9bc?auto=format&fit=crop&w=2000&q=85');
        }

        .slide-3 {
            background-image: url('https://images.unsplash.com/photo-1490481651871-ab68de25d43d?auto=format&fit=crop&w=2000&q=85');
        }

        .slide-content {
            position: relative;
            z-index: 2;
            max-width: 580px;
            animation: slideContent .9s ease;
        }

        .slide-tag {
            color: var(--gold);
            letter-spacing: 5px;
            font-size: 11px;
            margin-bottom: 22px;
        }

        .slide-content h1 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(38px, 5.5vw, 70px);
            line-height: 1.12;
            margin-bottom: 22px;
        }

        .slide-content h1 span {
            color: var(--gold);
        }

        .slide-content p {
            color: #ddd;
            font-size: 14px;
            line-height: 1.9;
            max-width: 460px;
            margin-bottom: 30px;
        }

        .gold-btn {
            display: inline-block;
            padding: 14px 27px;
            color: #080808;
            background: var(--gold);
            border: 1px solid var(--gold);
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1px;
            transition: .3s;
            cursor: pointer;
        }

        .gold-btn:hover {
            background: transparent;
            color: var(--gold);
            box-shadow: 0 0 15px #d4af3755;
            transform: translateY(-2px);
        }

        .slider-dots {
            position: absolute;
            bottom: 25px;
            left: 9%;
            z-index: 5;
            display: flex;
            gap: 10px;
        }

        .slider-dot {
            width: 28px;
            height: 4px;
            border: 0;
            padding: 0;
            background: #777;
            cursor: pointer;
            transition: .3s;
        }

        .slider-dot.active {
            width: 48px;
            background: var(--gold);
        }

        .slider-arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            z-index: 5;
            width: 42px;
            height: 42px;
            border: 1px solid #d4af3780;
            color: var(--gold);
            background: #0008;
            cursor: pointer;
            font-size: 20px;
            transition: .3s;
        }

        .slider-arrow:hover {
            background: var(--gold);
            color: black;
            box-shadow: 0 0 15px #d4af3780;
        }

        .slider-prev {
            left: 20px;
        }

        .slider-next {
            right: 20px;
        }

        @keyframes slideContent {
            from {
                opacity: 0;
                transform: translateY(25px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* FEATURES */

        .features {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            border-bottom: 1px solid var(--border);
        }

        .feature {
            text-align: center;
            padding: 25px 12px;
            border-right: 1px solid var(--border);
            transition: .3s;
        }

        .feature:last-child {
            border-right: 0;
        }

        .feature:hover {
            box-shadow: 0 0 16px #d4af3722;
        }

        .feature-icon {
            font-size: 23px;
            margin-bottom: 8px;
            color: var(--gold);
        }

        .feature h3 {
            font-size: 12px;
            color: var(--gold);
            margin-bottom: 5px;
        }

        .feature p {
            color: var(--muted);
            font-size: 10px;
        }

        /* PRODUCT SECTION */

        .container {
            width: 88%;
            max-width: 1300px;
            margin: auto;
        }

        .section {
            padding: 75px 0;
        }

        .section-heading {
            text-align: center;
            margin-bottom: 35px;
        }

        .section-heading small {
            color: var(--gold);
            letter-spacing: 4px;
            font-size: 10px;
        }

        .section-heading h2 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(30px, 4vw, 42px);
            margin: 12px 0;
        }

        .section-heading p {
            color: var(--muted);
            font-size: 12px;
        }

        /* ALERTS */

        .alert {
            padding: 14px 18px;
            margin-bottom: 20px;
            font-size: 13px;
            border: 1px solid var(--border);
        }

        .alert-success {
            color: var(--gold-light);
            background: #18160d;
        }

        .alert-error {
            color: #ffaaaa;
            background: #251111;
        }

        .alert-validation {
            color: #ffaaaa;
            background: #251111;
        }

        /* SEARCH AND FILTER */

        .filter-box {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            margin-bottom: 35px;
        }

        .filter-box input,
        .filter-box select {
            flex: 1;
            min-width: 180px;
            padding: 13px 15px;
            color: white;
            background: #141414;
            border: 1px solid var(--border);
            outline: none;
            font-size: 12px;
            transition: .3s;
        }

        .filter-box input:focus,
        .filter-box select:focus {
            border-color: var(--gold);
            box-shadow: 0 0 12px #d4af3733;
        }

        .filter-box select option {
            background: #141414;
        }

        .filter-box button {
            padding: 13px 25px;
            border: 1px solid var(--gold);
            color: #080808;
            background: var(--gold);
            font-size: 11px;
            font-weight: 700;
            cursor: pointer;
            transition: .3s;
        }

        .filter-box button:hover {
            background: transparent;
            color: var(--gold);
            box-shadow: 0 0 15px #d4af3755;
        }

        /* PRODUCT GRID */

        .product-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 24px;
        }

        .product-card {
            position: relative;
            isolation: isolate;
            background: var(--card);
            border: 1px solid #28251d;
            border-radius: 8px;
            overflow: hidden;
            transition: transform .35s ease, border-color .35s ease, box-shadow .35s ease;
            animation: slideContent .6s ease both;
        }

        .product-card:hover {
            transform: translateY(-7px);
            border-color: var(--gold-light);
            box-shadow:
                0 0 10px rgba(212, 175, 55, .65),
                0 0 25px rgba(212, 175, 55, .38),
                0 14px 32px rgba(0, 0, 0, .65);
            z-index: 10;
        }

        .product-card::before {
            content: "";
            position: absolute;
            top: -120%;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(
                to bottom,
                transparent 0%,
                rgba(212, 175, 55, .05) 38%,
                rgba(212, 175, 55, .65) 47%,
                rgba(255, 250, 205, .98) 50%,
                rgba(212, 175, 55, .65) 53%,
                rgba(212, 175, 55, .05) 62%,
                transparent 100%
            );
            opacity: 0;
            pointer-events: none;
            z-index: 6;
        }

        .product-card:hover::before {
            opacity: 1;
            animation: goldenLineShine 1.15s ease-in-out forwards;
        }

        @keyframes goldenLineShine {
            from {
                top: -120%;
            }

            to {
                top: 120%;
            }
        }

        .product-image {
            height: 300px;
            position: relative;
            background: #202020;
            overflow: hidden;
        }

        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform .6s;
        }

        .product-card:hover .product-image img {
            transform: scale(1.06);
        }

        .no-image {
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gold);
            font-family: 'Playfair Display', serif;
            font-size: 22px;
        }

        .wishlist-form {
            position: absolute;
            top: 12px;
            right: 12px;
            z-index: 7;
        }

        .heart-btn {
            width: 38px;
            height: 38px;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #080808d9;
            border: 1px solid #d4af3770;
            color: var(--gold);
            cursor: pointer;
            font-size: 20px;
            transition: .3s;
        }

        .heart-btn:hover {
            color: black;
            background: var(--gold);
            box-shadow: 0 0 15px #d4af3780;
        }

        .product-info {
            padding: 20px;
        }

        .product-category {
            font-size: 9px;
            letter-spacing: 2px;
            color: var(--gold);
            text-transform: uppercase;
            margin-bottom: 9px;
        }

        .product-info h3 {
            font-family: 'Playfair Display', serif;
            font-size: 19px;
            margin-bottom: 12px;
            overflow-wrap: anywhere;
        }

        .product-description {
            color: var(--muted);
            font-size: 11px;
            line-height: 1.7;
            margin-bottom: 14px;
        }

        .product-price {
            color: var(--gold);
            font-size: 21px;
            font-weight: 600;
            margin-bottom: 9px;
        }

        .stock {
            color: #aaa;
            font-size: 10px;
            margin-bottom: 17px;
        }

        .stock.out {
            color: #ff7777;
        }

        .product-actions {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 8px;
        }

        .action-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 11px 7px;
            border: 1px solid var(--gold);
            background: var(--gold);
            color: #080808;
            font-size: 10px;
            font-weight: 700;
            cursor: pointer;
            transition: .3s;
        }

        .action-btn:hover {
            color: var(--gold);
            background: transparent;
            box-shadow: 0 0 12px #d4af3744;
        }

        .action-btn.secondary {
            color: var(--gold);
            background: transparent;
        }

        .action-btn.secondary:hover {
            color: #080808;
            background: var(--gold);
        }

        .action-btn.full {
            grid-column: 1 / -1;
            width: 100%;
        }

        .delete-form {
            margin-top: 8px;
        }

        .delete-btn {
            width: 100%;
            padding: 9px;
            background: transparent;
            border: 1px solid #773737;
            color: #ff8888;
            cursor: pointer;
            font-size: 10px;
            transition: .3s;
        }

        .delete-btn:hover {
            background: #4a1717;
            box-shadow: 0 0 12px #ff444433;
        }

        .empty-products {
            grid-column: 1 / -1;
            padding: 60px 20px;
            border: 1px solid var(--border);
            text-align: center;
        }

        .empty-products h3 {
            color: var(--gold);
            font-family: 'Playfair Display', serif;
            font-size: 28px;
            margin-bottom: 15px;
        }

        .empty-products p {
            color: var(--muted);
            margin-bottom: 20px;
            font-size: 13px;
        }

        /* CTA */

        .cta {
            margin-bottom: 70px;
            padding: 55px 25px;
            text-align: center;
            border: 1px solid var(--border);
            background: linear-gradient(120deg, #15130d, #0b0b0b, #18140a);
            transition: .3s;
        }

        .cta:hover {
            box-shadow: 0 0 20px #d4af3722;
        }

        .cta h2 {
            font-family: 'Playfair Display', serif;
            font-size: 34px;
            margin-bottom: 12px;
        }

        .cta h2 span {
            color: var(--gold);
        }

        .cta p {
            color: var(--muted);
            font-size: 12px;
            margin-bottom: 25px;
        }

        /* FOOTER */

        footer {
            border-top: 1px solid var(--border);
            padding: 35px 7%;
            text-align: center;
            color: #888;
            font-size: 11px;
            line-height: 2;
        }

        footer span {
            color: var(--gold);
        }

        /* RESPONSIVE */

        @media (max-width: 1050px) {
            .product-grid {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }

            .product-image {
                height: 270px;
            }
        }

        @media (max-width: 760px) {
            .navbar {
                position: relative;
                padding: 18px 5%;
                flex-direction: column;
                align-items: flex-start;
            }

            .nav-links {
                gap: 15px;
            }

            .hero {
                height: 450px;
            }

            .hero-slide {
                padding: 40px 8%;
            }

            .slider-prev {
                left: 8px;
            }

            .slider-next {
                right: 8px;
            }

            .product-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 15px;
            }

            .container {
                width: 92%;
            }

            .product-image {
                height: 240px;
            }

            .product-info {
                padding: 14px;
            }

            .product-info h3 {
                font-size: 17px;
            }
        }

        @media (max-width: 480px) {
            .nav-links {
                gap: 12px;
            }

            .nav-links a {
                font-size: 11px;
            }

            .features {
                grid-template-columns: 1fr;
            }

            .feature {
                border-right: 0;
                border-bottom: 1px solid var(--border);
            }

            .product-grid {
                grid-template-columns: 1fr;
            }

            .product-image {
                height: 330px;
            }

            .filter-box {
                flex-direction: column;
            }

            .filter-box input,
            .filter-box select,
            .filter-box button {
                width: 100%;
            }

            .slide-content p {
                font-size: 12px;
            }

            .cta h2 {
                font-size: 27px;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                animation-duration: .01ms !important;
                transition-duration: .01ms !important;
            }
        }
    </style>
</head>

<body>

    {{-- NAVBAR --}}

    <nav class="navbar">

        <a href="{{ route('products.index') }}" class="logo">
            <span>Style</span>Cart.
        </a>

        <div class="nav-links">

    <a href="{{ route('products.index') }}">⌂ Home</a>

    <a href="{{ route('categories.index') }}">▦ Categories</a>

    <a href="{{ route('wishlist.index') }}">♡ Wishlist</a>

    <a href="{{ route('cart.index') }}">🛒 Cart</a>

    <a href="{{ route('orders.index') }}">📦 Orders</a>

    <a href="{{ route('products.index') }}">▤ Dashboard</a>

    <a href="{{ route('products.create') }}">✚ Add Product</a>

        </div>

    </nav>

    <div class="gold-line"></div>

    {{-- HERO SLIDER --}}

    <section class="hero" id="heroSlider">

        <div class="hero-slide slide-1 active">
            <div class="slide-content">
                <div class="slide-tag">THE NEW COLLECTION</div>

                <h1>
                    Discover Your<br>
                    <span>Luxury Style</span>
                </h1>

                <p>
                    Elevate your wardrobe with timeless fashion,
                    premium styles and elegant everyday essentials.
                </p>

                <a href="#products" class="gold-btn">
                    EXPLORE COLLECTION →
                </a>
            </div>
        </div>

        <div class="hero-slide slide-2">
            <div class="slide-content">
                <div class="slide-tag">TIMELESS ELEGANCE</div>

                <h1>
                    Fashion That<br>
                    <span>Defines You</span>
                </h1>

                <p>
                    Discover carefully selected styles designed to
                    make every moment feel special.
                </p>

                <a href="#products" class="gold-btn">
                    SHOP THE LOOK →
                </a>
            </div>
        </div>

        <div class="hero-slide slide-3">
            <div class="slide-content">
                <div class="slide-tag">STYLE YOUR MOMENT</div>

                <h1>
                    Elegance In<br>
                    <span>Every Detail</span>
                </h1>

                <p>
                    Find your next favourite outfit from our fashion
                    collection, all in one place.
                </p>

                <a href="#products" class="gold-btn">
                    FIND YOUR STYLE →
                </a>
            </div>
        </div>

        <button type="button"
                class="slider-arrow slider-prev"
                aria-label="Previous slide"
                id="prevSlide">
            &#10094;
        </button>

        <button type="button"
                class="slider-arrow slider-next"
                aria-label="Next slide"
                id="nextSlide">
            &#10095;
        </button>

        <div class="slider-dots">
            <button type="button"
                    class="slider-dot active"
                    aria-label="Show slide 1"
                    data-slide="0"></button>

            <button type="button"
                    class="slider-dot"
                    aria-label="Show slide 2"
                    data-slide="1"></button>

            <button type="button"
                    class="slider-dot"
                    aria-label="Show slide 3"
                    data-slide="2"></button>
        </div>

    </section>

    {{-- FEATURES --}}

    <section class="features">

        <div class="feature">
            <div class="feature-icon">✦</div>
            <h3>PREMIUM COLLECTION</h3>
            <p>Curated fashion for every occasion</p>
        </div>

        <div class="feature">
            <div class="feature-icon">◇</div>
            <h3>TIMELESS STYLE</h3>
            <p>Elegance in every detail</p>
        </div>

        <div class="feature">
            <div class="feature-icon">♡</div>
            <h3>MADE FOR YOU</h3>
            <p>Find styles that express you</p>
        </div>

    </section>

    {{-- PRODUCTS --}}

    <section class="section" id="products">

        <div class="container">

            <div class="section-heading">
                <small>CURATED FOR YOU</small>

                <h2>
                    Our <span style="color:#d4af37;">Collection</span>
                </h2>

                <p>
                    Explore our latest fashion and discover your next favourite look.
                </p>
            </div>

            {{-- FLASH MESSAGES --}}

            @if(session('success'))
                <div class="alert alert-success">
                    ✓ {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-error">
                    {{ session('error') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-validation">
                    <strong>Please check the following:</strong>

                    <ul style="padding-left:20px; margin-top:8px;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- SEARCH AND FILTER --}}

            <form action="{{ route('products.index') }}"
                  method="GET"
                  class="filter-box">

                <input
                    type="search"
                    name="search"
                    placeholder="Search fashion products..."
                    value="{{ request('search') }}"
                >

                <select name="category_id">
                    <option value="">All Categories</option>

                    @foreach($categories as $category)
                        <option
                            value="{{ $category->id }}"
                            {{ (string) request('category_id') === (string) $category->id ? 'selected' : '' }}
                        >
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>

                <button type="submit">SEARCH PRODUCTS</button>

            </form>

            {{-- PRODUCT CARDS --}}

            <div class="product-grid">

                @forelse($products as $product)

                    <article class="product-card">

                        <div class="product-image">

                            @if($product->image)

                                <img
                                    src="{{ asset('storage/' . $product->image) }}"
                                    alt="{{ $product->name }}"
                                    loading="lazy"
                                >

                            @else

                                <div class="no-image">
                                    StyleCart
                                </div>

                            @endif

                            {{-- WISHLIST BUTTON --}}

                            <form
                                action="{{ route('wishlist.add', $product->id) }}"
                                method="POST"
                                class="wishlist-form"
                            >
                                @csrf

                                <button
                                    type="submit"
                                    class="heart-btn"
                                    aria-label="Add to wishlist"
                                    title="Add to Wishlist"
                                >
                                    ♡
                                </button>
                            </form>

                        </div>

                        <div class="product-info">

                            <div class="product-category">
                                {{ $product->category->name ?? 'Fashion' }}
                            </div>

                            <h3>{{ $product->name }}</h3>

                            @if($product->description)
                                <p class="product-description">
                                    {{ \Illuminate\Support\Str::limit($product->description, 85) }}
                                </p>
                            @endif

                            <div class="product-price">
                                ₹{{ number_format((float) $product->price, 2) }}
                            </div>

                            <div class="stock {{ $product->stock < 1 ? 'out' : '' }}">
                                @if($product->stock > 0)
                                    {{ $product->stock }} items available
                                @else
                                    Out of stock
                                @endif
                            </div>

                            <div class="product-actions">

                                {{-- ADD TO CART --}}

                                @if($product->stock > 0)

                                    <form
                                        action="{{ route('cart.add', $product->id) }}"
                                        method="POST"
                                        class="action-btn full"
                                        style="padding:0; border:0; background:transparent;"
                                    >
                                        @csrf

                                        <input type="hidden" name="quantity" value="1">

                                        <button type="submit" class="action-btn full">
                                            ADD TO CART
                                        </button>
                                    </form>

                                @else

                                    <button
                                        type="button"
                                        class="action-btn full"
                                        disabled
                                        style="opacity:.5;cursor:not-allowed;"
                                    >
                                        OUT OF STOCK
                                    </button>

                                @endif

                                {{-- EDIT --}}

                                <a
                                    href="{{ route('products.edit', $product->id) }}"
                                    class="action-btn secondary"
                                >
                                    EDIT
                                </a>

                                {{-- VIEW CART --}}

                                <a
                                    href="{{ route('cart.index') }}"
                                    class="action-btn secondary"
                                >
                                    VIEW CART
                                </a>

                            </div>

                            {{-- DELETE PRODUCT --}}

                            <form
                                action="{{ route('products.destroy', $product->id) }}"
                                method="POST"
                                class="delete-form"
                                onsubmit="return confirm('Are you sure you want to delete this product?');"
                            >
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="delete-btn">
                                    DELETE PRODUCT
                                </button>
                            </form>

                        </div>

                    </article>

                @empty

                    <div class="empty-products">

                        <h3>No Products Found</h3>

                        <p>
                            No products match your search. Try another keyword
                            or add a new fashion product.
                        </p>

                        <a href="{{ route('products.create') }}" class="gold-btn">
                            + ADD A PRODUCT
                        </a>

                    </div>

                @endforelse

            </div>

        </div>

    </section>

    {{-- CALL TO ACTION --}}

    <section class="container">

        <div class="cta">

            <h2>
                Your Style. <span>Your Story.</span>
            </h2>

            <p>
                Discover the collection and find something that feels like you.
            </p>

            <a href="{{ route('products.create') }}" class="gold-btn">
                ADD NEW PRODUCT
            </a>

        </div>

    </section>

    {{-- FOOTER --}}

    <footer>

        <div style="font-family:'Playfair Display',serif;font-size:25px;margin-bottom:10px;">
            <span>Style</span>Cart.
        </div>

        <p>Luxury Fashion. Timeless Elegance.</p>

        <p>© {{ date('Y') }} StyleCart. All rights reserved.</p>

    </footer>

    {{-- SLIDER JAVASCRIPT --}}

    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const slider = document.getElementById('heroSlider');

            if (!slider) {
                return;
            }

            const slides = Array.from(
                slider.querySelectorAll('.hero-slide')
            );

            const dots = Array.from(
                slider.querySelectorAll('.slider-dot')
            );

            const previousButton = document.getElementById('prevSlide');
            const nextButton = document.getElementById('nextSlide');

            if (slides.length === 0) {
                return;
            }

            let currentIndex = 0;
            let autoSlideTimer;

            const SLIDE_INTERVAL = 5000;

            function showSlide(index) {

                currentIndex = (index + slides.length) % slides.length;

                slides.forEach(function (slide, i) {
                    slide.classList.toggle('active', i === currentIndex);
                });

                dots.forEach(function (dot, i) {
                    dot.classList.toggle('active', i === currentIndex);
                });
            }

            function nextSlide() {
                showSlide(currentIndex + 1);
            }

            function previousSlide() {
                showSlide(currentIndex - 1);
            }

            function startAutoSlide() {

                clearInterval(autoSlideTimer);

                if (slides.length > 1) {
                    autoSlideTimer = setInterval(
                        nextSlide,
                        SLIDE_INTERVAL
                    );
                }
            }

            if (nextButton) {
                nextButton.addEventListener('click', function () {
                    nextSlide();
                    startAutoSlide();
                });
            }

            if (previousButton) {
                previousButton.addEventListener('click', function () {
                    previousSlide();
                    startAutoSlide();
                });
            }

            dots.forEach(function (dot, index) {
                dot.addEventListener('click', function () {
                    showSlide(index);
                    startAutoSlide();
                });
            });

            showSlide(0);
            startAutoSlide();

        });
    </script>

</body>
</html>