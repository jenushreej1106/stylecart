<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>StyleCart | Luxury Fashion</title>

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --black: #080808;
            --dark: #111111;
            --gold: #d8ad55;
            --light-gold: #f3d48a;
            --white: #ffffff;
            --gray: #bdbdbd;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            background: var(--black);
            color: var(--white);
            font-family: 'Poppins', sans-serif;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        button {
            font-family: inherit;
            cursor: pointer;
        }

        /* NAVBAR */

        .navbar {
            min-height: 78px;
            padding: 15px 7%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 25px;
            background: rgba(8, 8, 8, .96);
            border-bottom: 1px solid rgba(216, 173, 85, .35);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .logo {
            font-family: 'Playfair Display', serif;
            font-size: 30px;
            font-weight: 700;
            color: var(--gold);
            white-space: nowrap;
        }

        .logo span {
            color: var(--white);
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 28px;
        }

        .nav-links a {
            font-size: 13px;
            transition: color .3s;
        }

        .nav-links a:hover {
            color: var(--gold);
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 18px;
            font-size: 13px;
        }

        .cart-link {
            border: 1px solid var(--gold);
            padding: 10px 15px;
            border-radius: 25px;
            color: var(--gold);
            transition: .3s;
        }

        .cart-link:hover {
            background: var(--gold);
            color: var(--black);
        }

        /* HERO SLIDER */

        .hero {
            position: relative;
            min-height: 480px;
            overflow: hidden;
            border-bottom: 1px solid rgba(216, 173, 85, .4);
            background: #15120e;
        }

        .slide {
            position: absolute;
            inset: 0;
            display: flex;
            align-items: center;
            padding: 60px 9%;
            opacity: 0;
            visibility: hidden;
            transform: scale(1.04);
            transition:
                opacity .8s ease,
                transform 1.2s ease,
                visibility .8s;
        }

        .slide.active {
            opacity: 1;
            visibility: visible;
            transform: scale(1);
            z-index: 1;
        }

        .slide::before {
            content: "";
            position: absolute;
            inset: 0;
            background:
                linear-gradient(
                    90deg,
                    rgba(0, 0, 0, .95) 0%,
                    rgba(0, 0, 0, .72) 42%,
                    rgba(0, 0, 0, .1) 100%
                );
            z-index: -1;
        }

        .slide-bg {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -2;
        }

        .hero-content {
            max-width: 580px;
            animation: textReveal .9s ease both;
        }

        .eyebrow {
            color: var(--light-gold);
            text-transform: uppercase;
            letter-spacing: 4px;
            font-size: 13px;
            margin-bottom: 15px;
        }

        .hero h1 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(42px, 5vw, 76px);
            line-height: 1.1;
            margin-bottom: 18px;
        }

        .hero h1 span {
            color: var(--gold);
        }

        .hero p {
            color: #d0d0d0;
            line-height: 1.9;
            max-width: 440px;
            font-size: 14px;
            margin-bottom: 28px;
        }

        .gold-btn {
            display: inline-block;
            border: none;
            border-radius: 30px;
            padding: 14px 28px;
            background: linear-gradient(120deg, var(--gold), var(--light-gold));
            color: #111;
            font-size: 13px;
            font-weight: 600;
            transition: transform .3s, box-shadow .3s;
        }

        .gold-btn:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 25px rgba(216, 173, 85, .3);
        }

        .slider-arrow {
            position: absolute;
            z-index: 5;
            top: 50%;
            transform: translateY(-50%);
            width: 44px;
            height: 44px;
            border-radius: 50%;
            border: 1px solid var(--gold);
            color: var(--gold);
            background: rgba(0, 0, 0, .5);
            font-size: 23px;
            transition: .3s;
        }

        .slider-arrow:hover {
            color: #000;
            background: var(--gold);
        }

        .prev {
            left: 30px;
        }

        .next {
            right: 30px;
        }

        .slider-dots {
            position: absolute;
            bottom: 22px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 9px;
            z-index: 5;
        }

        .dot {
            width: 9px;
            height: 9px;
            border: none;
            border-radius: 50%;
            background: #777;
            transition: .3s;
        }

        .dot.active {
            width: 28px;
            border-radius: 10px;
            background: var(--gold);
        }

        @keyframes textReveal {
            from {
                opacity: 0;
                transform: translateY(25px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* BENEFITS */

        .benefits {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            padding: 28px 7%;
            border-bottom: 1px solid #29251d;
        }

        .benefit {
            text-align: center;
            padding: 10px;
        }

        .benefit-icon {
            color: var(--gold);
            font-size: 25px;
            margin-bottom: 7px;
        }

        .benefit h3 {
            font-size: 13px;
            font-weight: 500;
        }

        .benefit p {
            font-size: 11px;
            color: var(--gray);
            margin-top: 5px;
        }

        /* SECTION */

        .section {
            padding: 55px 7%;
        }

        .section-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .section-heading h2 {
            font-family: 'Playfair Display', serif;
            font-size: 30px;
        }

        .section-heading p {
            color: var(--gold);
            font-size: 12px;
            margin-top: 6px;
        }

        .view-all {
            color: var(--gold);
            font-size: 13px;
        }

        /* CATEGORY */

        .categories {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 25px;
        }

        .category-card {
            text-align: center;
            cursor: pointer;
        }

        .category-image {
            width: 145px;
            height: 145px;
            margin: 0 auto 14px;
            overflow: hidden;
            border-radius: 50%;
            border: 1px solid rgba(216, 173, 85, .65);
            background: #17130d;
        }

        .category-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform .5s;
        }

        .category-card:hover img {
            transform: scale(1.15);
        }

        .category-card h3 {
            font-size: 13px;
            font-weight: 500;
        }

        /* PRODUCTS */

        .products {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 22px;
        }

        .product-card {
            overflow: hidden;
            background: #111;
            border: 1px solid #383027;
            border-radius: 12px;
            transition: transform .35s, border-color .35s, box-shadow .35s;
        }

        .product-card:hover {
            transform: translateY(-8px);
            border-color: var(--gold);
            box-shadow: 0 12px 30px rgba(216, 173, 85, .1);
        }

        .product-image {
            height: 230px;
            position: relative;
            overflow: hidden;
            background: #201c16;
        }

        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform .6s;
        }

        .product-card:hover .product-image img {
            transform: scale(1.08);
        }

        .product-info {
            padding: 17px;
        }

        .product-info h3 {
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 8px;
        }

        .product-info .description {
            color: var(--gray);
            font-size: 11px;
            line-height: 1.7;
            min-height: 36px;
        }

        .price {
            color: var(--gold);
            font-size: 17px;
            font-weight: 600;
            margin: 12px 0;
        }

        .product-btn {
            display: block;
            text-align: center;
            width: 100%;
            padding: 11px;
            border-radius: 6px;
            background: var(--gold);
            color: #111;
            font-size: 12px;
            font-weight: 600;
            transition: .3s;
        }

        .product-btn:hover {
            background: var(--light-gold);
            letter-spacing: .5px;
        }

        /* PROMOTION */

        .promotion {
            margin: 0 7% 55px;
            padding: 45px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            border: 1px solid #6f5527;
            border-radius: 14px;
            background:
                radial-gradient(ellipse at right, #423016 0%, #17120b 55%, #090909 100%);
        }

        .promotion h2 {
            font-family: 'Playfair Display', serif;
            font-size: 35px;
            color: var(--gold);
            margin-bottom: 10px;
        }

        .promotion p {
            color: #ddd;
            margin-bottom: 20px;
            font-size: 13px;
        }

        /* FOOTER */

        footer {
            padding: 40px 7% 20px;
            border-top: 1px solid #3c3020;
            background: #050505;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr;
            gap: 35px;
        }

        .footer-grid h3 {
            color: var(--gold);
            font-size: 14px;
            margin-bottom: 15px;
        }

        .footer-grid p,
        .footer-grid a {
            display: block;
            font-size: 12px;
            color: #aaa;
            line-height: 2.2;
        }

        .footer-grid a:hover {
            color: var(--gold);
        }

        .copyright {
            border-top: 1px solid #25211a;
            margin-top: 30px;
            padding-top: 18px;
            text-align: center;
            font-size: 11px;
            color: #888;
        }

        /* RESPONSIVE */

        @media (max-width: 1000px) {
            .navbar {
                flex-wrap: wrap;
            }

            .nav-links {
                gap: 15px;
            }

            .products {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .categories {
                grid-template-columns: repeat(4, 1fr);
            }
        }

        @media (max-width: 650px) {
            .navbar {
                padding: 15px 5%;
            }

            .logo {
                font-size: 25px;
            }

            .nav-links {
                order: 3;
                width: 100%;
                overflow-x: auto;
                padding: 8px 0;
            }

            .nav-actions {
                gap: 10px;
            }

            .hero {
                min-height: 430px;
            }

            .slide {
                padding: 45px 8%;
            }

            .hero h1 {
                font-size: 43px;
            }

            .hero p {
                font-size: 12px;
            }

            .slider-arrow {
                width: 34px;
                height: 34px;
            }

            .prev {
                left: 8px;
            }

            .next {
                right: 8px;
            }

            .benefits {
                grid-template-columns: repeat(2, 1fr);
                padding: 20px 5%;
            }

            .section {
                padding: 40px 5%;
            }

            .section-heading h2 {
                font-size: 25px;
            }

            .categories {
                grid-template-columns: repeat(2, 1fr);
                gap: 25px 10px;
            }

            .category-image {
                width: 115px;
                height: 115px;
            }

            .products {
                gap: 12px;
            }

            .product-image {
                height: 160px;
            }

            .product-info {
                padding: 12px;
            }

            .product-info h3 {
                font-size: 12px;
            }

            .promotion {
                margin: 0 5% 40px;
                padding: 25px;
            }

            .promotion h2 {
                font-size: 27px;
            }

            .footer-grid {
                grid-template-columns: 1fr;
                gap: 25px;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                scroll-behavior: auto !important;
                animation-duration: .01ms !important;
                transition-duration: .01ms !important;
            }
        }
    </style>
</head>

<body>

    <!-- NAVIGATION -->

    <header class="navbar">

        <a href="{{ route('home') }}" class="logo">
            Style<span>Cart</span>
        </a>

        <nav class="nav-links">
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('products.index') }}">Products</a>
            <a href="{{ route('categories.index') }}">Categories</a>
            <a href="#about">About Us</a>
            <a href="#contact">Contact</a>
        </nav>

        <div class="nav-actions">
            <a href="{{ route('cart.index') }}" class="cart-link">
                🛍 Shopping Cart
            </a>
        </div>

    </header>


    <!-- AUTOMATIC HERO SLIDER -->

    <section class="hero" id="home">

        <div class="slide active">

            <img
                class="slide-bg"
                src="https://images.unsplash.com/photo-1483985988355-763728e1935b?auto=format&fit=crop&w=1800&q=85"
                alt="Modern fashion collection"
            >

            <div class="hero-content">
                <div class="eyebrow">New Arrivals · 2026</div>

                <h1>
                    Modern <span>Fashion</span>
                </h1>

                <p>
                    Discover the latest styles, timeless collections,
                    and premium fashion made for your personality.
                </p>

                <a href="{{ route('products.index') }}" class="gold-btn">
                    Explore Collection →
                </a>
            </div>

        </div>


        <div class="slide">

            <img
                class="slide-bg"
                src="https://images.unsplash.com/photo-1539109136881-3be0616acf4b?auto=format&fit=crop&w=1800&q=85"
                alt="Elegant women's fashion"
            >

            <div class="hero-content">
                <div class="eyebrow">Elegant Collection</div>

                <h1>
                    Define Your <span>Style</span>
                </h1>

                <p>
                    Beautiful outfits for every occasion.
                    Express yourself with confidence and elegance.
                </p>

                <a href="{{ route('products.index') }}" class="gold-btn">
                    Shop Women →
                </a>
            </div>

        </div>


        <div class="slide">

            <img
                class="slide-bg"
                src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?auto=format&fit=crop&w=1800&q=85"
                alt="Luxury street style fashion"
            >

            <div class="hero-content">
                <div class="eyebrow">Exclusive Offers</div>

                <h1>
                    Luxury Meets <span>Style</span>
                </h1>

                <p>
                    Upgrade your wardrobe with statement pieces
                    and discover a new level of everyday fashion.
                </p>

                <a href="{{ route('products.index') }}" class="gold-btn">
                    Discover More →
                </a>
            </div>

        </div>


        <button class="slider-arrow prev" type="button" aria-label="Previous slide">
            ‹
        </button>

        <button class="slider-arrow next" type="button" aria-label="Next slide">
            ›
        </button>

        <div class="slider-dots" aria-label="Choose slide">
            <button class="dot active" type="button" aria-label="Slide 1"></button>
            <button class="dot" type="button" aria-label="Slide 2"></button>
            <button class="dot" type="button" aria-label="Slide 3"></button>
        </div>

    </section>


    <!-- SHOPPING BENEFITS -->

    <section class="benefits">

        <div class="benefit">
            <div class="benefit-icon">✦</div>
            <h3>Premium Quality</h3>
            <p>Style that lasts</p>
        </div>

        <div class="benefit">
            <div class="benefit-icon">♧</div>
            <h3>Secure Shopping</h3>
            <p>Shop with confidence</p>
        </div>

        <div class="benefit">
            <div class="benefit-icon">↻</div>
            <h3>Easy Returns</h3>
            <p>Simple return process</p>
        </div>

        <div class="benefit">
            <div class="benefit-icon">♡</div>
            <h3>Customer Support</h3>
            <p>We're here to help</p>
        </div>

    </section>


    <!-- CATEGORIES -->

    <section class="section">

        <div class="section-heading">
            <div>
                <h2>Shop by Category</h2>
                <p>Find your signature style</p>
            </div>

            <a href="{{ route('categories.index') }}" class="view-all">
                View Categories →
            </a>
        </div>


        <div class="categories">

            <a href="{{ route('products.index') }}" class="category-card">
                <div class="category-image">
                    <img src="https://images.unsplash.com/photo-1539109136881-3be0616acf4b?auto=format&fit=crop&w=500&q=80" alt="Dresses" loading="lazy">
                </div>
                <h3>Dresses</h3>
            </a>

            <a href="{{ route('products.index') }}" class="category-card">
                <div class="category-image">
                    <img src="https://images.unsplash.com/photo-1618354691373-d851c5c3a990?auto=format&fit=crop&w=500&q=80" alt="Tops" loading="lazy">
                </div>
                <h3>Tops</h3>
            </a>

            <a href="{{ route('products.index') }}" class="category-card">
                <div class="category-image">
                    <img src="https://images.unsplash.com/photo-1542272604-787c3835535d?auto=format&fit=crop&w=500&q=80" alt="Jeans" loading="lazy">
                </div>
                <h3>Jeans</h3>
            </a>

            <a href="{{ route('products.index') }}" class="category-card">
                <div class="category-image">
                    <img src="https://images.unsplash.com/photo-1548036328-c9fa89d128fa?auto=format&fit=crop&w=500&q=80" alt="Fashion Bags" loading="lazy">
                </div>
                <h3>Fashion Bags</h3>
            </a>

        </div>

    </section>


    <!-- FEATURED PRODUCTS -->

    <section class="section" id="products">

        <div class="section-heading">
            <div>
                <h2>Trending Collection</h2>
                <p>Luxury looks. Everyday confidence.</p>
            </div>

            <a href="{{ route('products.index') }}" class="view-all">
                View All Products →
            </a>
        </div>


        <div class="products">

            <article class="product-card">
                <div class="product-image">
                    <img src="https://images.unsplash.com/photo-1539109136881-3be0616acf4b?auto=format&fit=crop&w=700&q=80" alt="Elegant dress" loading="lazy">
                </div>

                <div class="product-info">
                    <h3>Elegant Fashion Dress</h3>
                    <p class="description">A timeless look for your special moments.</p>
                    <div class="price">Explore Price</div>
                    <a href="{{ route('products.index') }}" class="product-btn">
                        Explore Products →
                    </a>
                </div>
            </article>


            <article class="product-card">
                <div class="product-image">
                    <img src="https://images.unsplash.com/photo-1598033129183-c4f50c736f10?auto=format&fit=crop&w=700&q=80" alt="Premium shirt" loading="lazy">
                </div>

                <div class="product-info">
                    <h3>Premium Casual Shirt</h3>
                    <p class="description">Minimal design with a premium finish.</p>
                    <div class="price">Explore Price</div>
                    <a href="{{ route('products.index') }}" class="product-btn">
                        Explore Products →
                    </a>
                </div>
            </article>


            <article class="product-card">
                <div class="product-image">
                    <img src="https://images.unsplash.com/photo-1542272604-787c3835535d?auto=format&fit=crop&w=700&q=80" alt="Classic denim jeans" loading="lazy">
                </div>

                <div class="product-info">
                    <h3>Classic Denim Jeans</h3>
                    <p class="description">Effortless style for every day.</p>
                    <div class="price">Explore Price</div>
                    <a href="{{ route('products.index') }}" class="product-btn">
                        Explore Products →
                    </a>
                </div>
            </article>


            <article class="product-card">
                <div class="product-image">
                    <img src="https://images.unsplash.com/photo-1548036328-c9fa89d128fa?auto=format&fit=crop&w=700&q=80" alt="Luxury handbag" loading="lazy">
                </div>

                <div class="product-info">
                    <h3>Luxury Handbag</h3>
                    <p class="description">The perfect finishing touch to your outfit.</p>
                    <div class="price">Explore Price</div>
                    <a href="{{ route('products.index') }}" class="product-btn">
                        Explore Products →
                    </a>
                </div>
            </article>

        </div>

    </section>


    <!-- PROMOTION -->

    <section class="promotion">

        <div>
            <div class="eyebrow">Limited Time Collection</div>

            <h2>Luxury Looks. Special Prices.</h2>

            <p>
                Explore the complete collection and find your next favourite outfit.
            </p>

            <a href="{{ route('products.index') }}" class="gold-btn">
                Shop Collection →
            </a>
        </div>

        <div style="font-size: 65px; color: #d8ad55;">
            ✧
        </div>

    </section>


    <!-- FOOTER -->

    <footer id="about">

        <div class="footer-grid">

            <div>
                <a href="{{ route('home') }}" class="logo">
                    Style<span>Cart</span>
                </a>

                <p style="margin-top: 15px;">
                    Your style, your story. Discover fashion that
                    makes every moment special.
                </p>
            </div>

            <div>
                <h3>Quick Links</h3>
                <a href="{{ route('home') }}">Home</a>
                <a href="{{ route('products.index') }}">Products</a>
                <a href="{{ route('categories.index') }}">Categories</a>
                <a href="{{ route('cart.index') }}">Shopping Cart</a>
            </div>

            <div id="contact">
                <h3>Customer Support</h3>
                <p>Contact Us</p>
                <p>Shipping Information</p>
                <p>Returns & Exchanges</p>
                <p>Privacy Policy</p>
            </div>

        </div>

        <div class="copyright">
            © {{ date('Y') }} StyleCart. All rights reserved.
            Made with ♥ for fashion lovers.
        </div>

    </footer>


    <!-- SLIDER JAVASCRIPT -->

    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const slides = document.querySelectorAll('.slide');
            const dots = document.querySelectorAll('.dot');
            const previousButton = document.querySelector('.prev');
            const nextButton = document.querySelector('.next');
            const hero = document.querySelector('.hero');

            let currentSlide = 0;
            let sliderTimer;

            function showSlide(index) {

                slides[currentSlide].classList.remove('active');
                dots[currentSlide].classList.remove('active');

                currentSlide = (index + slides.length) % slides.length;

                slides[currentSlide].classList.add('active');
                dots[currentSlide].classList.add('active');
            }

            function startSlider() {
                clearInterval(sliderTimer);

                sliderTimer = setInterval(function () {
                    showSlide(currentSlide + 1);
                }, 4500);
            }

            nextButton.addEventListener('click', function () {
                showSlide(currentSlide + 1);
                startSlider();
            });

            previousButton.addEventListener('click', function () {
                showSlide(currentSlide - 1);
                startSlider();
            });

            dots.forEach(function (dot, index) {
                dot.addEventListener('click', function () {
                    showSlide(index);
                    startSlider();
                });
            });

            hero.addEventListener('mouseenter', function () {
                clearInterval(sliderTimer);
            });

            hero.addEventListener('mouseleave', startSlider);

            startSlider();
        });
    </script>

</body>
</html>