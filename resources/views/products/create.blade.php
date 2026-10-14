<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>StyleCart - Add Product</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #ffe0e9, #e0c3fc);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 25px;
        }

        .container {
            width: 450px;
            max-width: 100%;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            animation: slideUp 0.8s ease;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h1 {
            text-align: center;
            color: #ff4d6d;
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-top: 15px;
            margin-bottom: 6px;
            font-weight: bold;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 14px;
            transition: 0.3s;
        }

        input:focus,
        textarea:focus,
        select:focus {
            border-color: #ff4d6d;
            outline: none;
            box-shadow: 0 0 8px rgba(255, 77, 109, 0.3);
        }

        textarea {
            height: 80px;
            resize: vertical;
        }

        input[type="file"] {
            background: #fff5f7;
        }

        button {
            width: 100%;
            padding: 13px;
            margin-top: 25px;
            background: #ff4d6d;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background: #e63956;
            transform: scale(1.03);
        }

        .back {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #ff4d6d;
            text-decoration: none;
        }

        .error {
            color: #d00000;
            font-size: 13px;
            margin-top: 5px;
        }

        .success {
            color: green;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>

    <div class="container">

        <h1>🛍️ Add Product</h1>

        @if ($errors->any())
            <div class="error">
                <strong>Please fix these errors:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('products.store') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <label for="name">Product Name</label>
            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name') }}"
                placeholder="Enter product name"
                required
            >

            <label for="description">Description</label>
            <textarea
                id="description"
                name="description"
                placeholder="Enter product description"
            >{{ old('description') }}</textarea>

            <label for="price">Price (₹)</label>
            <input
                type="number"
                id="price"
                name="price"
                value="{{ old('price') }}"
                placeholder="Enter price"
                step="0.01"
                min="0"
                required
            >

            <label for="stock">Stock</label>
            <input
                type="number"
                id="stock"
                name="stock"
                value="{{ old('stock') }}"
                placeholder="Enter stock quantity"
                min="0"
                required
            >

            <label for="category_id">Category</label>
            <select name="category_id" id="category_id" required>

                <option value="">Select Category</option>

                @foreach ($categories as $category)
                    <option
                        value="{{ $category->id }}"
                        {{ old('category_id') == $category->id ? 'selected' : '' }}
                    >
                        {{ $category->name }}
                    </option>
                @endforeach

            </select>

            <label for="image">Product Image</label>
            <input
                type="file"
                name="image"
                id="image"
                accept="image/jpeg,image/png,image/webp"
            >

            <small>Allowed formats: JPG, JPEG, PNG, WEBP. Maximum size: 2 MB.</small>

            <button type="submit">
                ➕ Add Product
            </button>

        </form>

        <a href="{{ route('products.index') }}" class="back">
            ← Back to Products
        </a>

    </div>

</body>
</html>