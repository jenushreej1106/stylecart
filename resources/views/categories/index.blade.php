<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Categories | StyleCart</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --gold: #d4af37;
            --gold-light: #f5df8e;
            --black: #111111;
            --dark: #191919;
            --white: #ffffff;
            --gray: #aaaaaa;
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
            padding: 22px 7%;
            background: #080808;
            border-bottom: 1px solid rgba(212, 175, 55, 0.3);
            flex-wrap: wrap;
            gap: 20px;
        }

        .logo {
            font-size: 27px;
            font-weight: 700;
            color: var(--gold);
            letter-spacing: 2px;
        }

        .logo span {
            color: white;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 25px;
            flex-wrap: wrap;
        }

        .nav-links a {
            color: #dddddd;
            text-decoration: none;
            font-size: 14px;
            transition: 0.3s;
        }

        .nav-links a:hover,
        .nav-links a.active {
            color: var(--gold);
        }

        /* Main Container */
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 55px auto;
        }

        /* Heading */
        .heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 15px;
            flex-wrap: wrap;
            animation: slideDown 0.7s ease;
        }

        .heading h1 {
            font-size: 34px;
            font-weight: 600;
        }

        .heading h1 span {
            color: var(--gold);
        }

        .subtitle {
            color: var(--gray);
            font-size: 14px;
            margin-bottom: 35px;
            animation: fadeIn 1s ease;
        }

        /* Buttons */
        .btn {
            display: inline-block;
            padding: 12px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
            border: 1px solid var(--gold);
        }

        .btn-gold {
            background: var(--gold);
            color: #111;
        }

        .btn-gold:hover {
            background: var(--gold-light);
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(212, 175, 55, 0.2);
        }

        .btn-outline {
            color: var(--gold);
            background: transparent;
        }

        .btn-outline:hover {
            background: var(--gold);
            color: #111;
        }

        /* Category Count */
        .category-count {
            display: flex;
            align-items: center;
            gap: 15px;
            background: var(--dark);
            border: 1px solid #333;
            border-left: 4px solid var(--gold);
            border-radius: 8px;
            padding: 20px 25px;
            margin-bottom: 35px;
            animation: slideUp 0.7s ease;
        }

        .count-icon {
            width: 55px;
            height: 55px;
            background: rgba(212, 175, 55, 0.12);
            border-radius: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 27px;
        }

        .count-number {
            font-size: 25px;
            font-weight: 700;
            color: var(--gold);
        }

        .count-label {
            color: var(--gray);
            font-size: 13px;
        }

        /* Category Grid */
        .category-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 25px;
        }

        .category-card {
            background: linear-gradient(145deg, #202020, #141414);
            border: 1px solid #333;
            border-radius: 12px;
            padding: 28px;
            position: relative;
            overflow: hidden;
            transition: transform 0.35s, border-color 0.35s,
                        box-shadow 0.35s;
            animation: slideUp 0.7s ease both;
        }

        .category-card:nth-child(2) {
            animation-delay: 0.1s;
        }

        .category-card:nth-child(3) {
            animation-delay: 0.2s;
        }

        .category-card:nth-child(4) {
            animation-delay: 0.3s;
        }

        .category-card::before {
            content: "";
            position: absolute;
            width: 140px;
            height: 140px;
            background: rgba(212, 175, 55, 0.06);
            border-radius: 50%;
            right: -55px;
            top: -55px;
            transition: 0.4s;
        }

        .category-card:hover {
            transform: translateY(-8px);
            border-color: var(--gold);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.35);
        }

        .category-card:hover::before {
            transform: scale(1.4);
        }

        .category-icon {
            width: 65px;
            height: 65px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 12px;
            background: rgba(212, 175, 55, 0.12);
            border: 1px solid rgba(212, 175, 55, 0.3);
            font-size: 30px;
            margin-bottom: 22px;
        }

        .category-card h2 {
            color: var(--gold-light);
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 12px;
            overflow-wrap: anywhere;
        }

        .description {
            color: #b7b7b7;
            font-size: 13px;
            line-height: 1.8;
            min-height: 48px;
            overflow-wrap: anywhere;
        }

        .category-id {
            color: #888;
            font-size: 12px;
            margin-top: 22px;
            padding-top: 15px;
            border-top: 1px solid #333;
        }

        .category-id span {
            color: var(--gold);
        }

        /* Empty State */
        .empty-state {
            grid-column: 1 / -1;
            text-align: center;
            padding: 60px 20px;
            background: var(--dark);
            border: 1px dashed #555;
            border-radius: 12px;
        }

        .empty-state .empty-icon {
            font-size: 55px;
            margin-bottom: 20px;
        }

        .empty-state h2 {
            color: var(--gold);
            margin-bottom: 10px;
        }

        .empty-state p {
            color: var(--gray);
            margin-bottom: 25px;
        }

        /* Messages */
        .alert {
            padding: 14px 18px;
            margin-bottom: 25px;
            border-radius: 6px;
            font-size: 14px;
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

        /* Footer */
        footer {
            text-align: center;
            padding: 25px;
            color: #777;
            font-size: 12px;
            border-top: 1px solid #292929;
            margin-top: 80px;
        }

        footer span {
            color: var(--gold);
        }

        /* Animations */
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-25px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        /* Responsive */
        @media (max-width: 900px) {
            .category-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 600px) {
            .navbar {
                padding: 18px 5%;
            }

            .logo {
                font-size: 23px;
            }

            .nav-links {
                gap: 15px;
            }

            .container {
                width: 92%;
                margin: 35px auto;
            }

            .heading h1 {
                font-size: 27px;
            }

            .category-grid {
                grid-template-columns: 1fr;
            }

            .category-card {
                padding: 23px;
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

            <a href="{{ route('categories.index') }}" class="active">
                Categories
            </a>

            <a href="{{ route('cart.index') }}">My Cart</a>

            <a href="{{ route('dashboard') }}">Dashboard</a>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container">

        <div class="heading">
            <h1>Our <span>Categories</span></h1>

            <a href="{{ route('categories.create') }}" class="btn btn-gold">
                + Add Category
            </a>
        </div>

        <p class="subtitle">
            Explore our collections and discover your perfect style.
        </p>

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

        <!-- Category Count -->
        <div class="category-count">
            <div class="count-icon">✦</div>

            <div>
                <div class="count-number">
                    {{ $categories->count() }}
                </div>

                <div class="count-label">
                    Total Fashion Categories
                </div>
            </div>
        </div>

        <!-- Category Cards -->
        <div class="category-grid">

            @forelse($categories as $category)

                <article class="category-card">

                    <div class="category-icon">
                        🛍️
                    </div>

                    <h2>
                        {{ $category->name }}
                    </h2>

                    <p class="description">
                        {{ $category->description ?: 'Discover our exclusive fashion collection.' }}
                    </p>

                    <div class="category-id">
                        CATEGORY ID:
                        <span>#{{ $category->id }}</span>
                    </div>

                </article>

            @empty

                <div class="empty-state">
                    <div class="empty-icon">🛍️</div>

                    <h2>No Categories Yet</h2>

                    <p>
                        Start building your fashion collection by adding a category.
                    </p>

                    <a href="{{ route('categories.create') }}"
                       class="btn btn-gold">
                        + Create First Category
                    </a>
                </div>

            @endforelse

        </div>

        <!-- Back Button -->
        <div style="margin-top: 35px;">
            <a href="{{ route('products.index') }}" class="btn btn-outline">
                ← Back to Products
            </a>
        </div>

    </main>

    <!-- Footer -->
    <footer>
        © {{ date('Y') }} <span>StyleCart</span>.
        Fashion that defines you.
    </footer>

</body>
</html>