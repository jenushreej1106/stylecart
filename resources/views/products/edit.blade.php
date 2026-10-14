<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>StyleCart - Edit Product</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 25px;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #ffe0e9, #e0c3fc);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            width: 450px;
            max-width: 100%;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }

        h1 {
            text-align: center;
            color: #ff4d6d;
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
        }

        textarea {
            height: 80px;
            resize: vertical;
        }

        .current-image,
        .preview-image {
            width: 100%;
            max-height: 250px;
            object-fit: contain;
            border-radius: 10px;
            margin-top: 10px;
            background: #f5f5f5;
        }

        .preview-image {
            display: none;
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
        }

        button:hover {
            background: #e63956;
        }

        .back {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #ff4d6d;
            text-decoration: none;
        }

        .error {
            color: red;
            margin-bottom: 15px;
        }

        .help-text {
            display: block;
            margin-top: 8px;
            color: #666;
            font-size: 12px;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>✏️ Edit Product</h1>

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

    <form
        action="{{ route('products.update', $product->id) }}"
        method="POST"
        enctype="multipart/form-data"
    >

        @csrf
        @method('PUT')

        <label for="name">Product Name</label>

        <input
            type="text"
            id="name"
            name="name"
            value="{{ old('name', $product->name) }}"
            required
        >

        <label for="description">Description</label>

        <textarea
            id="description"
            name="description"
        >{{ old('description', $product->description) }}</textarea>

        <label for="price">Price (₹)</label>

        <input
            type="number"
            id="price"
            name="price"
            value="{{ old('price', $product->price) }}"
            step="0.01"
            min="0"
            required
        >

        <label for="stock">Stock</label>

        <input
            type="number"
            id="stock"
            name="stock"
            value="{{ old('stock', $product->stock) }}"
            min="0"
            required
        >

        <label for="category_id">Category</label>

        <select name="category_id" id="category_id" required>

            @foreach ($categories as $category)
                <option
                    value="{{ $category->id }}"
                    {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}
                >
                    {{ $category->name }}
                </option>
            @endforeach

        </select>

        <label>Current Product Image</label>

        @if ($product->image)
            <img
                src="{{ asset('storage/' . $product->image) }}"
                alt="{{ $product->name }}"
                class="current-image"
            >
        @else
            <p>No image uploaded yet.</p>
        @endif

        <label for="image">Upload New Image</label>

        <input
            type="file"
            name="image"
            id="image"
            accept="image/jpeg,image/png,image/webp"
        >

        <span class="help-text">
            JPG, JPEG, PNG, WEBP — Maximum 2 MB.
        </span>

        <img
            id="imagePreview"
            src="#"
            alt="New Image Preview"
            class="preview-image"
        >

        <button type="submit">
            💾 Update Product
        </button>

    </form>

    <a href="{{ route('products.index') }}" class="back">
        ← Back to Products
    </a>

</div>

<script>
    const imageInput = document.getElementById('image');
    const imagePreview = document.getElementById('imagePreview');

    imageInput.addEventListener('change', function () {
        const file = this.files[0];

        if (file) {
            if (!file.type.startsWith('image/')) {
                alert('Please select an image file.');
                this.value = '';
                imagePreview.style.display = 'none';
                return;
            }

            imagePreview.src = URL.createObjectURL(file);
            imagePreview.style.display = 'block';
        } else {
            imagePreview.style.display = 'none';
            imagePreview.removeAttribute('src');
        }
    });
</script>

</body>
</html>