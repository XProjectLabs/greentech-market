<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Produit</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f5f5;
            padding: 20px;
        }

        form {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        h1 {
            color: #2c5530;
            margin-bottom: 30px;
            font-size: 2em;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #333;
        }

        label .required {
            color: #e74c3c;
        }

        input[type="text"],
        input[type="number"],
        input[type="url"],
        textarea,
        select {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 15px;
            transition: border-color 0.3s;
        }

        input:focus,
        textarea:focus,
        select:focus {
            outline: none;
            border-color: #2c5530;
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        .form-actions {
            display: flex;
            gap: 15px;
            margin-top: 30px;
        }

        .btn {
            flex: 1;
            padding: 15px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-primary {
            background: #2c5530;
            color: white;
        }

        .btn-primary:hover {
            background: #1e3a20;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(44, 85, 48, 0.3);
        }

        .btn-secondary {
            background: #6c757d;
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-secondary:hover {
            background: #5a6268;
        }

        .alert {
            padding: 15px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-danger {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .alert ul {
            margin: 0;
            padding-left: 20px;
        }

        .mb-0 {
            margin-bottom: 0;
        }
    </style>
</head>
<body>

<form action="{{ route('admin.products.store') }}" method="POST">
    @csrf
    <h1>Ajouter un Produit</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="form-group">
        <label for="name">
            Nom du produit <span class="required">*</span>
        </label>
        <input type="text" 
               id="name" 
               name="name" 
               value="{{ old('name') }}" 
               required
               maxlength="150">
    </div>

    <div class="form-group">
        <label for="description">
            Description <span class="required">*</span>
        </label>
        <textarea id="description" 
                  name="description" 
                  required>{{ old('description') }}</textarea>
    </div>

    <div class="form-group">
        <label for="category_id">
            Catégorie <span class="required">*</span>
        </label>
        <select id="category_id" name="category_id" required>
            <option value="">-- Sélectionner une catégorie --</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="price">
            Prix (MAD) <span class="required">*</span>
        </label>
        <input type="number" 
               id="price" 
               name="price" 
               value="{{ old('price') }}" 
               step="0.01" 
               min="0" 
               required>
    </div>

    <div class="form-group">
        <label for="stock">
            Stock <span class="required">*</span>
        </label>
        <input type="number" 
               id="stock" 
               name="stock" 
               value="{{ old('stock') }}" 
               min="0" 
               required>
    </div>

    <div class="form-group">
        <label for="image_url">
            URL de l'image
        </label>
        <input type="url" 
               id="image_url" 
               name="image_url" 
               value="{{ old('image_url') }}" 
               placeholder="https://example.com/image.jpg"
               maxlength="255">
    </div>

    <div class="form-actions">
        <a href="{{ route('admin.products') }}" class="btn btn-secondary">Annuler</a>
        <button type="submit" class="btn btn-primary">Ajouter le produit</button>
    </div>

</form>

</body>
</html>