<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Product | StyleCart</title>

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
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: var(--black);
            color: var(--white);
            min-height: 100vh;
        }

        /* Navbar */
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
            gap: 25px;
            flex-wrap: wrap;
        }

        .nav-links a {
            color: #dddddd;
            text-decoration: none;
            font-size: 13px;
            transition: 0.3s;
        }

        .nav-links a:hover {
            color: var(--gold);
        }

        /* Page Layout */
        .page-container {
            max-width: 1100px;
            width: 92%;
            margin: 45px auto;
            display: grid;
            grid-template-columns: 0.9fr 1.1fr;
            gap: 35px;
            align-items: center;
            animation: slideUp 0.7s ease;
        }

        /* Left Panel */
        .intro-panel {
            padding: 25px;
        }

        .intro-label {
            display: inline-block;
            color: var(--gold);
            border: 1px solid #66551f;
            background: #211d10;
            padding: 8px 14px;
            border-radius: 30px;
            font-size: 11px;
            letter-spacing: 2px;
            margin-bottom: 25px;
        }

        .intro-panel h1 {
            font-size: 43px;
            line-height: 1.25;
            margin-bottom: 20px;
        }

        .intro-panel h1 span {
            color: var(--gold);
        }

        .intro-panel p {
            color: var(--gray);
            font-size: 14px;
            line-height: 1.9;
            margin-bottom: 30px;
        }

        .feature {
            display: flex;
            align-items: center;
            gap: 15px;
            margin: 22px 0;
        }

        .feature-icon {
            width: 45px;
            height: 45px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #5e4d1d;
            background: #211d10;
            border-radius: 10px;
            color: var(--gold);
            font-size: 20px;
        }

        .feature h3 {
            font-size: 14px;
            font-weight: 500;
        }

        .feature small {
            color: var(--gray);
            font-size: 11px;
        }

        /* Form Card */
        .form-card {
            background: linear-gradient(145deg, #202020, #151515);
            border: 1px solid #51451e;
            border-radius: 15px;
            padding: 35px;
            box-shadow: 0 20px 55px rgba(0, 0, 0, 0.4);
        }

        .form-heading {
            text-align: center;
            margin-bottom: 30px;
        }

        .form-heading .icon {
            font-size: 34px;
            margin-bottom: 8px;
        }

        .form-heading h2 {
            color: var(--gold);
            font-size: 27px;
            font-weight: 600;
        }

        .form-heading p {
            color: var(--gray);
            font-size: 12px;
            margin-top: 8px;
        }

        /* Form Fields */
        .form-group {
            margin-bottom: 19px;
        }

        label {
            display: block;
            font-size: 12px;
            font-weight: 500;
            color: #eeeeee;
            margin-bottom: 8px;
        }

        label span {
            color: var(--gold);
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 13px 14px;
            border: 1px solid #414141;
            border-radius: 6px;
            outline: none;
            background: #111111;
            color: white;
            font-family: inherit;
            font-size: 12px;
            transition: 0.3s;
        }

        input::placeholder,
        textarea::placeholder {
            color: #777777;
        }

        input:focus,
        textarea:focus,
        select:focus {
            border-color: var(--gold);
            box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.09);
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        select option {
            background: #191919;
            color: white;
        }

        input[type="file"] {
            padding: 10px;
            background: #111111;
            cursor: pointer;
        }

        input[type="file"]::file-selector-button {
            background: var(--gold);
            color: #111111;
            border: none;
            padding: 8px 12px;
            border-radius: 4px;
            margin-right: 12px;
            cursor: pointer;
            font-family: inherit;
            font-weight: 600;
        }

        .help-text {
            color: #999999;
            font-size: 10px;
            margin-top: 8px;
        }

        .error-text {
            color: #ff7777;
            font-size: 11px;
            margin-top: 6px;
        }

        .alert-error {
            background: #301818;
            border: 1px solid #783535;
            color: #ffc2c2;
            border-radius: 6px;
            padding: 13px;
            font-size: 12px;
            margin-bottom: 20px;
        }

        /* Buttons */
        .button-group {
            display: flex;
            gap: 12px;
            margin-top: 27px;
        }

        .btn {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            text-decoration: none;
            padding: 13px 18px;
            border-radius: 6px;
            font-family: inherit;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-submit {
            flex: 1;
            border: 1px solid var(--gold);
            background: var(--gold);
            color: #111111;
        }

        .btn-submit:hover {
            background: var(--light-gold);
            transform: translateY(-2px);
            box-shadow: 0 7px 20px rgba(212, 175, 55, 0.18);
        }

        .btn-back {
            border: 1px solid #555555;
            color: #eeeeee;
            background: transparent;
        }

        .btn-back:hover {
            border-color: var(--gold);
            color: var(--gold);
        }

        footer {
            text-align: center;
            padding: 25px;
            color: #777777;
            font-size: 11px;
            border-top: 1px solid #292929;
            margin-top: 45px;
        }

        footer span {
            color: var(--gold);
        }

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

        @media (max-width: 800px) {
            .page-container {
                grid-template-columns: 1fr;
                max-width: 550px;
            }

            .intro-panel {
                padding: 5px;
            }

            .intro-panel h1 {
                font-size: 34px;
            }

            .form-card {
                padding: 25px;
            }
        }

        @media (max-width: 480px) {
            .navbar {
                padding: 18px 5%;
            }

            .logo {
                font-size: 22px;
            }

            .nav-links {
                gap: 15px;
            }

            .page-container {
                margin: 25px auto;
            }

            .button-group {
                flex-direction: column;
            }

            .btn-back {
                width: 100%;
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
            <a href="{{ route('cart.index') }}">My Cart</a>
            <a href="{{ route('dashboard') }}">Dashboard</a>
        </div>
    </nav>

    <!-- Main Section -->
    <main class="page-container">

        <!-- Left Introduction -->
        <section class="intro-panel">

            <div class="intro-label">
                ✦ PRODUCT MANAGEMENT
            </div>

            <h1>
                Add Your Next<br>
                <span>Fashion Favourite.</span>
            </h1>

            <p>
                Expand your collection with beautiful fashion products.
                Add product details, manage inventory, select categories,
                and upload product images in one place.
            </p>

            <div class="feature">
                <div class="feature-icon">✦</div>
                <div>
                    <h3>Premium Collection</h3>
                    <small>Organise your fashion products.</small>
                </div>
            </div>

            <div class="feature">
                <div class="feature-icon">₹</div>
                <div>
                    <h3>Smart Pricing</h3>
                    <small>Set the price for every product.</small>
                </div>
            </div>

            <div class="feature">
                <div class="feature-icon">▦</div>
                <div>
                    <h3>Stock Management</h3>
                    <small>Keep track of available quantities.</small>
                </div>
            </div>

        </section>

        <!-- Product Form -->
        <section class="form-card">

            <div class="form-heading">
                <div class="icon">🛍️</div>
                <h2>Add Product</h2>
                <p>Enter the details of your new product below.</p>
            </div>

            @if ($errors->any())
                <div class="alert-error">
                    <strong>Please check the following:</strong>

                    <ul style="padding-left: 20px; margin-top: 8px;">
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

                <!-- Product Name -->
                <div class="form-group">
                    <label for="name">
                        Product Name <span>*</span>
                    </label>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        placeholder="Enter product name"
                        value="{{ old('name') }}"
                        maxlength="255"
                        required
                    >

                    @error('name')
                        <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Description -->
                <div class="form-group">
                    <label for="description">Description</label>

                    <textarea
                        id="description"
                        name="description"
                        placeholder="Enter product description"
                    >{{ old('description') }}</textarea>

                    @error('description')
                        <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Price -->
                <div class="form-group">
                    <label for="price">
                        Price (₹) <span>*</span>
                    </label>

                    <input
                        type="number"
                        id="price"
                        name="price"
                        placeholder="Enter price"
                        value="{{ old('price') }}"
                        min="0"
                        step="0.01"
                        required
                    >

                    @error('price')
                        <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Stock -->
                <div class="form-group">
                    <label for="stock">
                        Stock Quantity <span>*</span>
                    </label>

                    <input
                        type="number"
                        id="stock"
                        name="stock"
                        placeholder="Enter available quantity"
                        value="{{ old('stock') }}"
                        min="0"
                        step="1"
                        required
                    >

                    @error('stock')
                        <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Category -->
                <div class="form-group">
                    <label for="category_id">
                        Category <span>*</span>
                    </label>

                    <select id="category_id"
                            name="category_id"
                            required>

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

                    @error('category_id')
                        <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Product Image -->
                <div class="form-group">
                    <label for="image">Product Image</label>

                    <input
                        type="file"
                        id="image"
                        name="image"
                        accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp"
                    >

                    <p class="help-text">
                        JPG, JPEG, PNG or WEBP. Maximum size: 2 MB.
                    </p>

                    @error('image')
                        <div class="error-text">{{ $message }}</div>
                    @enderror

                    <img
                        id="imagePreview"
                        src=""
                        alt="Product image preview"
                        style="display:none; width:100%; max-height:220px;
                               object-fit:contain; margin-top:15px;
                               border:1px solid #51451e; border-radius:8px;
                               padding:8px;"
                    >
                </div>

                <!-- Buttons -->
                <div class="button-group">

                    <a href="{{ route('products.index') }}"
                       class="btn btn-back">
                        ← Back
                    </a>

                    <button type="submit" class="btn btn-submit">
                        + Add Product
                    </button>

                </div>

            </form>

        </section>

    </main>

    <footer>
        © {{ date('Y') }} <span>StyleCart</span>.
        Fashion that defines you.
    </footer>

    <script>
        const imageInput = document.getElementById('image');
        const imagePreview = document.getElementById('imagePreview');

        imageInput.addEventListener('change', function () {
            const file = this.files[0];

            if (!file) {
                imagePreview.src = '';
                imagePreview.style.display = 'none';
                return;
            }

            const allowedTypes = [
                'image/jpeg',
                'image/png',
                'image/webp'
            ];

            if (!allowedTypes.includes(file.type)) {
                alert('Please select a JPG, PNG, or WEBP image.');
                this.value = '';
                imagePreview.src = '';
                imagePreview.style.display = 'none';
                return;
            }

            if (file.size > 2 * 1024 * 1024) {
                alert('Image size must not exceed 2 MB.');
                this.value = '';
                imagePreview.src = '';
                imagePreview.style.display = 'none';
                return;
            }

            imagePreview.src = URL.createObjectURL(file);
            imagePreview.style.display = 'block';
        });
    </script>

</body>
</html>