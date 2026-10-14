<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category | StyleCart</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #fce4ec, #e3f2fd);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            width: 90%;
            max-width: 450px;
            padding: 30px;
            background: white;
            border-radius: 18px;
            box-shadow: 0 10px 30px #0002;
            animation: slideIn 0.7s ease;
        }

        h1 {
            text-align: center;
            color: #d63384;
        }

        label {
            display: block;
            margin: 15px 0 7px;
            font-weight: bold;
        }

        input, textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 15px;
        }

        button {
            width: 100%;
            padding: 13px;
            margin-top: 20px;
            border: none;
            border-radius: 8px;
            background: #d63384;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background: #a61e62;
            transform: translateY(-2px);
        }

        a {
            display: block;
            text-align: center;
            margin-top: 18px;
            color: #d63384;
            text-decoration: none;
        }

        .error {
            color: red;
            font-size: 14px;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(25px);
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
        <h1>✨ Add Category</h1>

        @if ($errors->any())
            <div class="error">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('categories.store') }}" method="POST">
            @csrf

            <label for="name">Category Name</label>
            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name') }}"
                placeholder="Example: Dresses"
                required
            >

            <label for="description">Description</label>
            <textarea
                id="description"
                name="description"
                rows="4"
                placeholder="Enter category description"
            >{{ old('description') }}</textarea>

            <button type="submit">Save Category</button>
        </form>

        <a href="{{ route('categories.index') }}">← Back to Categories</a>
    </div>
</body>
</html>