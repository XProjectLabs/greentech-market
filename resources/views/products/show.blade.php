<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }} - GreenTech Market</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #1a4d2e 0%, #2d5f3f 100%);
            color: #fff;
            min-height: 100vh;
        }

        /* Navigation */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 50px;
            background: rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(10px);
        }

        .logo {
            font-size: 24px;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo::before {
            content: "🌱";
            font-size: 28px;
        }

        .nav-links {
            display: flex;
            gap: 30px;
            align-items: center;
        }

        .nav-links a {
            color: #fff;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }

        .nav-links a:hover {
            color: #a8e063;
        }

        .btn-account {
            padding: 10px 25px;
            border: 2px solid #a8e063;
            border-radius: 25px;
            color: #a8e063;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
        }

        .btn-account:hover {
            background: #a8e063;
            color: #1a4d2e;
        }

        /* Breadcrumb */
        .breadcrumb {
            max-width: 1400px;
            margin: 30px auto 0;
            padding: 0 50px;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 14px;
        }

        .breadcrumb a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: color 0.3s;
        }

        .breadcrumb a:hover {
            color: #a8e063;
        }

        .breadcrumb span {
            color: rgba(255, 255, 255, 0.4);
        }

        /* Product Detail Section */
        .product-detail {
            max-width: 1400px;
            margin: 40px auto;
            padding: 0 50px 80px;
        }

        .product-layout {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 30px;
            padding: 50px;
            color: #333;
        }

        /* Image Section */
        .product-image-section {
            position: relative;
        }

        .product-main-image {
            width: 100%;
            aspect-ratio: 1;
            border-radius: 20px;
            object-fit: cover;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
        }

        .image-badge {
            position: absolute;
            top: 20px;
            left: 20px;
            padding: 10px 20px;
            background: #a8e063;
            color: #1a4d2e;
            border-radius: 25px;
            font-weight: 700;
            font-size: 14px;
            text-transform: uppercase;
        }

        /* Info Section */
        .product-info-section {
            display: flex;
            flex-direction: column;
            gap: 25px;
        }

        .product-category {
            display: inline-block;
            padding: 8px 20px;
            background: #e8f5e9;
            color: #2d5f3f;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            width: fit-content;
        }

        .product-title {
            font-size: 3em;
            font-weight: 700;
            color: #1a4d2e;
            line-height: 1.2;
        }

        .product-price-section {
            padding: 25px;
            background: linear-gradient(135deg, #a8e063 0%, #8bc34a 100%);
            border-radius: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .product-price {
            font-size: 3em;
            font-weight: 700;
            color: #1a4d2e;
        }

        .price-label {
            font-size: 0.4em;
            font-weight: 500;
            color: rgba(26, 77, 46, 0.7);
            display: block;
        }

        .stock-indicator {
            padding: 12px 25px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            font-weight: 600;
            color: #1a4d2e;
        }

        .stock-high {
            color: #2e7d32;
        }

        .stock-low {
            color: #f57c00;
        }

        .stock-out {
            color: #c62828;
        }

        .product-description {
            font-size: 1.1em;
            line-height: 1.8;
            color: #555;
            padding: 20px;
            background: #f9f9f9;
            border-radius: 15px;
            border-left: 4px solid #a8e063;
        }

        .description-title {
            font-size: 1.2em;
            font-weight: 700;
            color: #1a4d2e;
            margin-bottom: 15px;
        }

        .product-meta {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .meta-card {
            padding: 20px;
            background: #f5f5f5;
            border-radius: 15px;
            text-align: center;
        }

        .meta-label {
            font-size: 13px;
            color: #999;
            font-weight: 600;
            text-transform: uppercase;
            margin-bottom: 8px;
            letter-spacing: 0.5px;
        }

        .meta-value {
            font-size: 1.5em;
            font-weight: 700;
            color: #1a4d2e;
        }

        .action-buttons {
            display: flex;
            gap: 15px;
            margin-top: 10px;
        }

        .btn-back {
            flex: 1;
            padding: 18px;
            background: transparent;
            border: 2px solid #ddd;
            border-radius: 15px;
            color: #666;
            font-weight: 700;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            text-align: center;
        }

        .btn-back:hover {
            background: #f5f5f5;
            border-color: #bbb;
        }

        .btn-add-cart {
            flex: 2;
            padding: 18px;
            background: #1a4d2e;
            border: none;
            border-radius: 15px;
            color: #fff;
            font-weight: 700;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-add-cart:hover {
            background: #2d5f3f;
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(26, 77, 46, 0.3);
        }

        /* Related Products */
        .related-section {
            max-width: 1400px;
            margin: 60px auto 0;
            padding: 0 50px 80px;
        }

        .section-header {
            text-align: center;
            margin-bottom: 50px;
        }

        .section-badge {
            display: inline-block;
            padding: 8px 20px;
            background: rgba(168, 224, 99, 0.2);
            border: 1px solid #a8e063;
            border-radius: 25px;
            color: #a8e063;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .section-title {
            font-size: 2.5em;
            font-weight: 700;
            color: #fff;
        }

        .related-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 30px;
        }

        .related-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.3s;
            cursor: pointer;
        }

        .related-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }

        .related-image {
            width: 100%;
            height: 220px;
            object-fit: cover;
        }

        .related-info {
            padding: 20px;
        }

        .related-name {
            font-size: 1.2em;
            font-weight: 700;
            color: #1a4d2e;
            margin-bottom: 10px;
        }

        .related-price {
            font-size: 1.5em;
            font-weight: 700;
            color: #a8e063;
        }

        .related-price span {
            font-size: 0.6em;
            color: #666;
        }

        /* Responsive */
        @media (max-width: 968px) {
            .product-layout {
                grid-template-columns: 1fr;
                padding: 30px;
            }

            .product-title {
                font-size: 2em;
            }

            .navbar {
                padding: 15px 20px;
                flex-direction: column;
                gap: 15px;
            }

            .breadcrumb,
            .product-detail,
            .related-section {
                padding-left: 20px;
                padding-right: 20px;
            }

            .product-meta {
                grid-template-columns: 1fr;
            }

            .related-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

    <!-- Navigation -->
    <nav class="navbar">
        <div class="logo">GreenTech Market</div>
        <div class="nav-links">
            <a href="{{ route('home') }}">Accueil</a>
            <a href="{{ route('products.index') }}">Boutique</a>
            <a href="#" class="btn-account">Mon compte</a>
        </div>
    </nav>

    <!-- Breadcrumb -->
    <div class="breadcrumb">
        <a href="{{ route('products.index') }}">Produits</a>
        <span>/</span>
        <a href="{{ route('products.index', ['category' => $product->category_id]) }}">
            {{ $product->category->name ?? 'Non classé' }}
        </a>
        <span>/</span>
        <strong style="color: #a8e063;">{{ $product->name }}</strong>
    </div>

    <!-- Product Detail -->
    <section class="product-detail">
        <div class="product-layout">
            <!-- Image Section -->
            <div class="product-image-section">
                <img src="{{ $product->image_url ?? 'https://images.unsplash.com/photo-1466692476868-aef1dfb1e735?w=600' }}" 
                     alt="{{ $product->name }}"
                     class="product-main-image">
                <div class="image-badge">{{ $product->category->name ?? 'Produit' }}</div>
            </div>

            <!-- Info Section -->
            <div class="product-info-section">
                <div class="product-category">
                    🌿 {{ $product->category->name ?? 'Non classé' }}
                </div>

                <h1 class="product-title">{{ $product->name }}</h1>

                <div class="product-price-section">
                    <div class="product-price">
                        <span class="price-label">Prix</span>
                        {{ number_format($product->price, 0) }} MAD
                    </div>
                    <div class="stock-indicator {{ $product->stock < 5 ? ($product->stock == 0 ? 'stock-out' : 'stock-low') : 'stock-high' }}">
                        @if($product->stock > 10)
                            ✓ En stock
                        @elseif($product->stock > 0)
                            ⚠ {{ $product->stock }} restants
                        @else
                            ✗ Rupture
                        @endif
                    </div>
                </div>

                @if($product->description)
                    <div class="product-description">
                        <div class="description-title">📝 Description</div>
                        <p>{{ $product->description }}</p>
                    </div>
                @endif

                <div class="product-meta">
                    <div class="meta-card">
                        <div class="meta-label">Catégorie</div>
                        <div class="meta-value">{{ $product->category->name ?? 'N/A' }}</div>
                    </div>
                    <div class="meta-card">
                        <div class="meta-label">Stock</div>
                        <div class="meta-value">{{ $product->stock }} unités</div>
                    </div>
                </div>

                <div class="action-buttons">
                    <a href="{{ route('products.index') }}" class="btn-back">← Retour</a>
                    <button class="btn-add-cart">🛒 Ajouter au panier</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Products -->
    @if($relatedProducts->count() > 0)
        <section class="related-section">
            <div class="section-header">
                <div class="section-badge">Recommandations</div>
                <h2 class="section-title">Produits similaires</h2>
            </div>

            <div class="related-grid">
                @foreach($relatedProducts as $relatedProduct)
                    <div class="related-card" onclick="window.location='{{ route('products.show', $relatedProduct->id) }}'">
                        <img src="{{ $relatedProduct->image_url ?? 'https://images.unsplash.com/photo-1466692476868-aef1dfb1e735?w=400' }}" 
                             alt="{{ $relatedProduct->name }}"
                             class="related-image">
                        <div class="related-info">
                            <div class="related-name">{{ $relatedProduct->name }}</div>
                            <div class="related-price">
                                {{ number_format($relatedProduct->price, 0) }} <span>MAD</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @endif

</body>
</html>