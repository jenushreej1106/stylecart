<!DOCTYPE html>

<html lang="en"> <head>     <meta charset="UTF-8">     <meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>My Wishlist | StyleCart</title>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;700&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        background: #080808;
        color: #fff;
        font-family: 'Poppins', sans-serif;
        min-height: 100vh;
    }

    nav {
        padding: 20px 7%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid #40351a;
    }

    .logo {
        color: #d4af37;
        font-family: 'Playfair Display', serif;
        font-size: 28px;
        font-weight: bold;
        text-decoration: none;
    }

    nav a:last-child {
        color: #d4af37;
        text-decoration: none;
    }

    .container {
        width: 88%;
        max-width: 1250px;
        margin: 50px auto;
    }

    h1 {
        text-align: center;
        color: #d4af37;
        font-family: 'Playfair Display', serif;
        font-size: 38px;
        margin-bottom: 12px;
    }

    .subtitle {
        text-align: center;
        color: #aaa;
        margin-bottom: 40px;
        font-size: 13px;
    }

    .message {
        padding: 14px;
        margin-bottom: 25px;
        text-align: center;
        color: #d4af37;
        border: 1px solid #806b2b;
        border-radius: 5px;
    }

    .products {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 25px;
    }

    .card {
        background: #151515;
        border: 1px solid #302a1b;
        overflow: hidden;
        transition: .3s;
        animation: slideUp .5s ease;
    }

    .card:hover {
        transform: translateY(-7px);
        border-color: #d4af37;
        box-shadow: 0 10px 25px #d4af3715;
    }

    .card img {
        width: 100%;
        height: 300px;
        object-fit: cover;
        display: block;
    }

    .no-image {
        height: 300px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #d4af37;
        background: #202020;
    }

    .card-content {
        padding: 22px;
    }

    .card h3 {
        font-family: 'Playfair Display', serif;
        font-size: 22px;
        margin-bottom: 12px;
        overflow-wrap: anywhere;
    }

    .price {
        color: #d4af37;
        font-size: 22px;
        font-weight: 600;
        margin-bottom: 18px;
    }

    button,
    .btn {
        display: inline-block;
        padding: 12px 18px;
        border: 1px solid #d4af37;
        background: #d4af37;
        color: #080808;
        font-weight: 600;
        font-size: 12px;
        text-decoration: none;
        cursor: pointer;
        transition: .3s;
    }

    button:hover,
    .btn:hover {
        background: transparent;
        color: #d4af37;
    }

    .empty {
        text-align: center;
        padding: 65px 20px;
        background: #121212;
        border: 1px solid #302a1b;
    }

    .empty h2 {
        font-family: 'Playfair Display', serif;
        font-size: 27px;
        margin-bottom: 15px;
    }

    .empty p {
        color: #aaa;
        margin-bottom: 25px;
    }

    .bottom {
        text-align: center;
        margin: 40px 0;
    }

    footer {
        border-top: 1px solid #40351a;
        text-align: center;
        padding: 25px;
        color: #999;
        font-size: 12px;
    }

    footer span {
        color: #d4af37;
    }

    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @media (max-width: 900px) {
        .products {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (max-width: 600px) {
        .products {
            grid-template-columns: 1fr;
        }

        .container {
            width: 92%;
        }

        h1 {
            font-size: 30px;
        }

        .card img,
        .no-image {
            height: 270px;
        }
    }
</style>

</head>

<body>

<nav>
    <a href="{{ route('products.index') }}" class="logo">
        StyleCart.
    </a>

    <a href="{{ route('cart.index') }}">
        🛒 My Cart
    </a>
</nav>

<main class="container">

    <h1>♡ MY WISHLIST</h1>

    <p class="subtitle">
        Your favourite fashion pieces, all in one place.
    </p>

    @if(session('success'))
        <div class="message">
            ✓ {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="message">
            {{ session('error') }}
        </div>
    @endif

    @if($products->isEmpty())

        <div class="empty">
            <h2>Your Wishlist is Empty ❤️</h2>

            <p>
                Add your favourite fashion products to your wishlist.
            </p>

            <a href="{{ route('products.index') }}" class="btn">
                Explore Products
            </a>
        </div>

    @else

        <div class="products">

            @foreach($products as $product)

                <div class="card">

                    @if($product->image)
                        <img
                            src="{{ asset('storage/' . $product->image) }}"
                            alt="{{ $product->name }}"
                            loading="lazy"
                        >
                    @else
                        <div class="no-image">
                            StyleCart Fashion
                        </div>
                    @endif

                    <div class="card-content">

                        <h3>{{ $product->name }}</h3>

                        <div class="price">
                            ₹{{ number_format((float) $product->price, 2) }}
                        </div>

                        <form
                            action="{{ route('wishlist.remove', $product->id) }}"
                            method="POST"
                            onsubmit="return confirm('Remove this product from your wishlist?');"
                        >
                            @csrf
                            @method('DELETE')

                            <button type="submit">
                                ♥ Remove from Wishlist
                            </button>
                        </form>

                    </div>

                </div>

            @endforeach

        </div>

    @endif

    <div class="bottom">
        <a href="{{ route('products.index') }}" class="btn">
            ← Continue Shopping
        </a>
    </div>

</main>

<footer>
    © {{ date('Y') }} <span>StyleCart.</span> Luxury Fashion.
</footer>

</body> </html>
