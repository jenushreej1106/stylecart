<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Categories | StyleCart</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 30px;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #fce4ec, #e3f2fd);
            min-height: 100vh;
        }

        .container {
            max-width: 1000px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 18px;
            box-shadow: 0 10px 30px #0002;
            animation: appear 0.7s ease;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 25px;
        }

        h1 {
            color: #d63384;
            margin: 0;
        }

        .btn {
            display: inline-block;
            padding: 12px 18px;
            background: #d63384;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            transition: 0.3s;
        }

        .btn:hover {
            background: #a61e62;
            transform: translateY(-2px);
        }

        .success {
            padding: 12px;
            margin-bottom: 20px;
            background: #d1e7dd;
            color: #0f5132;
            border-radius: 8px;
        }

        .category-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
        }

        .category-card {
            padding: 25px;
            border: 1px solid #f3c5dc;
            border-radius: 12px;
            transition: 0.3s;
            background: #fffafd;
        }

        .category-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px #d6338420;
        }

        .icon {
            font-size: 35px;
        }

        h2 {
            color: #333;
            margin-bottom: 10px;
        }

        .description {
            color: #666;
            line-height: 1.6;
        }

        .empty {
            text-align: center;
            padding: 40px 10px;
            color: #777;
        }

        @keyframes appear {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">
        <h1>✨ StyleCart Categories</h1>

        <a href="{{ route('categories.create') }}" class="btn">
            + Add Category
        </a>
    </div>

    @if (session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    @if ($categories->count() > 0)

        <div class="category-grid">

            @foreach ($categories as $category)

                <div class="category-card">

                    <div class="icon">🛍️</div>

                    <h2>{{ $category->name }}</h2>

                    <p class="description">
                        {{ $category->description ?? 'No description available.' }}
                    </p>

                    <p>
                        <strong>Category ID:</strong>
                        {{ $category->id }}
                    </p>

                </div>

            @endforeach

        </div>

    @else

        <div class="empty">
            <h2>No categories available</h2>
            <p>Click "Add Category" to create your first category.</p>
        </div>

    @endif

    <br>

    <a href="{{ route('products.index') }}" class="btn">
        ← Back to Products
    </a>

</div>

</body>
</html>