<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>StyleCart - Products</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 25px;
            font-family: Arial, sans-serif;
            background: #f6f6fb;
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin: auto;
        }

        h1 {
            text-align: center;
            color: #ff4d6d;
            margin-bottom: 25px;
        }

        .top-buttons {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 25px;
        }

        .btn {
            display: inline-block;
            padding: 10px 16px;
            border: none;
            border-radius: 6px;
            background: #ff4d6d;
            color: white;
            text-decoration: none;
            cursor: pointer;
            font-size: 14px;
        }

        .btn:hover {
            background: #e83e60;
        }

        .cart-btn {
            background: #222;
        }

        .cart-btn:hover {
            background: #444;
        }

        .search-box {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 25px;
        }

        input, select {
            padding: 11px;
            border: 1px solid #ddd;
            border-radius: 6px;
        }

        .search-box input {
            flex: 1;
            min-width: 180px;
        }

        .products {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(230px, 1fr));
            gap: 22px;
        }

        .product-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.08);
            padding-bottom: 18px;
        }

        .product-image {
            width: 100%;
            height: 250px;
            object-fit: cover;
            background: #eee;
        }

        .no-image {
            height: 250px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #eee;
            color: #777;
        }

        .product-info {
            padding: 15px;
        }

        .product-info h3 {
            margin: 0 0 10px;
        }

        .description {
            color: #777;
            font-size: 14px;
            min-height: 35px;
        }

        .price {
            color: #ff4d6d;
            font-size: 21px;
            font-weight: bold;
        }

        .stock {
            font-size: 13px;
            color: #555;
            margin-bottom: 12px;
        }

        .add-cart-form {
            display: flex;
            gap: 8px;
            margin-bottom: 10px;
        }

        .quantity {
            width: 65px;
        }

        .add-cart-form button {
            flex: 1;
        }

        .edit-btn {
            background: #0d6efd;
        }

        .delete-btn {
            background: #dc3545;
        }

        .product-actions {
            display: flex;
            gap: 8px;
        }

        .product-actions form,
        .product-actions a {
            flex: 1;
        }

        .product-actions button,
        .product-actions a {
            width: 100%;
            text-align: center;
        }

        .message {
            background: #d1e7dd;
            color: #0f5132;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 15px;
        }

        .error-message {
            background: #f8d7da;
            color: #842029;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 15px;
        }

        .empty {
            text-align: center;
            background: white;
            padding: 40px;
            border-radius: 10px;
        }

        @media (max-width: 500px) {
            body {
                padding: 12px;
            }

            .top-buttons {
                flex-direction: column;
            }

            .top-buttons .btn {
                text-align: center;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <h1>🛍️ StyleCart Products</h1>

    @if(session('success'))
        <div class="message">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="error-message">
            {{ session('error') }}
        </div>
    @endif

    <div class="top-buttons">

        <a href="{{ route('products.create') }}" class="btn">
            ➕ Add Product
        </a>

        <a href="{{ route('categories.index') }}" class="btn">
            📂 Categories
        </a>

        <a href="{{ route('cart.index') }}" class="btn cart-btn">
            🛒 View Shopping Cart
        </a>

    </div>

    <form action="{{ route('products.index') }}"
          method="GET"
          class="search-box">

        <input
            type="text"
            name="search"
            placeholder="Search products..."
            value="{{ request('search') }}"
        >

        <select name="category_id">
            <option value="">All Categories</option>

            @foreach($categories as $category)
                <option
                    value="{{ $category->id }}"
                    {{ request('category_id') == $category->id ? 'selected' : '' }}
                >
                    {{ $category->name }}
                </option>
            @endforeach
        </select>

        <button type="submit" class="btn">
            🔍 Search
        </button>

        <a href="{{ route('products.index') }}" class="btn cart-btn">
            Reset
        </a>

    </form>

    @if($products->count() > 0)

        <div class="products">

            @foreach($products as $product)

                <div class="product-card">

                    @if($product->image)
                        <img
                            src="{{ asset('storage/' . $product->image) }}"
                            alt="{{ $product->name }}"
                            class="product-image"
                        >
                    @else
                        <div class="no-image">
                            No Image Available
                        </div>
                    @endif

                    <div class="product-info">

                        <h3>{{ $product->name }}</h3>

                        <p class="description">
                            {{ $product->description ?: 'Fashion product' }}
                        </p>

                        <p>
                            Category:
                            {{ $product->category->name ?? 'Uncategorized' }}
                        </p>

                        <p class="price">
                            ₹{{ number_format((float)$product->price, 2) }}
                        </p>

                        <p class="stock">
                            Available Stock: {{ $product->stock }}
                        </p>

                        {{-- ADD TO CART BUTTON --}}
                        <form
                            action="{{ route('cart.add', $product->id) }}"
                            method="POST"
                            class="add-cart-form"
                        >
                            @csrf

                            <input
                                type="number"
                                name="quantity"
                                value="1"
                                min="1"
                                max="{{ $product->stock }}"
                                class="quantity"
                                required
                                {{ $product->stock < 1 ? 'disabled' : '' }}
                            >

                            <button
                                type="submit"
                                class="btn"
                                {{ $product->stock < 1 ? 'disabled' : '' }}
                            >
                                🛒 Add to Cart
                            </button>
                        </form>

                        @if($product->stock < 1)
                            <p style="color:red;">Out of Stock</p>
                        @endif

                        <div class="product-actions">

                            <a
                                href="{{ route('products.edit', $product->id) }}"
                                class="btn edit-btn"
                            >
                                ✏️ Edit
                            </a>

                            <form
                                action="{{ route('products.destroy', $product->id) }}"
                                method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this product?')"
                            >
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn delete-btn">
                                    🗑️ Delete
                                </button>
                            </form>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    @else

        <div class="empty">
            <h2>No Products Found 😔</h2>
            <p>Add a product or change your search.</p>

            <a href="{{ route('products.create') }}" class="btn">
                Add Your First Product
            </a>
        </div>

    @endif

</div>

</body>
</html>