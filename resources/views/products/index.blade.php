<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boutique - GreenTech Market</title>
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

        /* Hero Section */
        .hero {
            text-align: center;
            padding: 80px 20px 40px;
        }

        .hero-badge {
            display: inline-block;
            padding: 8px 20px;
            background: rgba(168, 224, 99, 0.2);
            border: 1px solid #a8e063;
            border-radius: 25px;
            color: #a8e063;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .hero h1 {
            font-size: 3.5em;
            font-weight: 700;
            margin-bottom: 20px;
            line-height: 1.2;
        }

        .hero h1 .highlight {
            color: #a8e063;
        }

        .hero p {
            font-size: 1.2em;
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 10px;
        }

        /* Search and Filter Section */
        .filters-container {
            max-width: 1400px;
            margin: 40px auto;
            padding: 0 50px;
        }

        .search-section {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 30px;
        }

        .search-bar {
            display: flex;
            gap: 15px;
            margin-bottom: 25px;
        }

        .search-input {
            flex: 1;
            padding: 15px 25px;
            border: 2px solid rgba(168, 224, 99, 0.3);
            border-radius: 50px;
            background: rgba(255, 255, 255, 0.9);
            font-size: 16px;
            color: #1a4d2e;
            outline: none;
            transition: all 0.3s;
        }

        .search-input:focus {
            border-color: #a8e063;
            background: #fff;
        }

        .search-input::placeholder {
            color: #999;
        }

        .btn-search {
            padding: 15px 40px;
            background: #a8e063;
            border: none;
            border-radius: 50px;
            color: #1a4d2e;
            font-weight: 700;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-search:hover {
            background: #8bc34a;
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(168, 224, 99, 0.3);
        }

        .filters-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .filter-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #a8e063;
            font-size: 14px;
        }

        .filter-select,
        .filter-input {
            width: 100%;
            padding: 12px 20px;
            border: 2px solid rgba(168, 224, 99, 0.3);
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.9);
            font-size: 15px;
            color: #1a4d2e;
            outline: none;
            transition: all 0.3s;
        }

        .filter-select:focus,
        .filter-input:focus {
            border-color: #a8e063;
            background: #fff;
        }

        .filter-actions {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .btn-filter {
            flex: 1;
            padding: 12px;
            background: #a8e063;
            border: none;
            border-radius: 12px;
            color: #1a4d2e;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-filter:hover {
            background: #8bc34a;
        }

        .btn-reset {
            flex: 1;
            padding: 12px;
            background: transparent;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 12px;
            color: #fff;
            font-weight: 600;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
        }

        .btn-reset:hover {
            background: rgba(255, 255, 255, 0.1);
            border-color: rgba(255, 255, 255, 0.5);
        }

        /* Results Section */
        .results-header {
            max-width: 1400px;
            margin: 0 auto;
            padding: 20px 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .results-title {
            font-size: 2em;
            font-weight: 700;
        }

        .results-count {
            color: rgba(255, 255, 255, 0.8);
            font-size: 1.1em;
        }

        .results-count strong {
            color: #a8e063;
        }

        /* Products Grid */
        .products-section {
            max-width: 1400px;
            margin: 0 auto;
            padding: 20px 50px 80px;
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 30px;
        }

        .product-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.3s;
            cursor: pointer;
            position: relative;
        }

        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }

        .product-image-wrapper {
            position: relative;
            height: 280px;
            overflow: hidden;
            background: #f5f5f5;
        }

        .product-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s;
        }

        .product-card:hover .product-image {
            transform: scale(1.1);
        }

        .product-badge {
            position: absolute;
            top: 15px;
            left: 15px;
            padding: 6px 15px;
            background: #a8e063;
            color: #1a4d2e;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
        }

        .product-stock-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            padding: 6px 12px;
            background: rgba(0, 0, 0, 0.7);
            color: #fff;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
        }

        .stock-high {
            background: rgba(76, 175, 80, 0.9);
        }

        .stock-low {
            background: rgba(255, 152, 0, 0.9);
        }

        .product-info {
            padding: 25px;
            color: #333;
        }

        .product-name {
            font-size: 1.3em;
            font-weight: 700;
            color: #1a4d2e;
            margin-bottom: 10px;
        }

        .product-description {
            font-size: 0.95em;
            color: #666;
            margin-bottom: 15px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            line-height: 1.5;
        }

        .product-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 15px;
            border-top: 2px solid #f0f0f0;
        }

        .product-price {
            font-size: 1.8em;
            font-weight: 700;
            color: #a8e063;
        }

        .product-price span {
            font-size: 0.6em;
            color: #666;
            font-weight: 500;
        }

        .btn-view {
            padding: 10px 20px;
            background: #1a4d2e;
            color: #fff;
            border: none;
            border-radius: 10px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-view:hover {
            background: #2d5f3f;
        }

        /* No Results */
        .no-results {
            text-align: center;
            padding: 100px 20px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            margin: 40px;
        }

        .no-results-icon {
            font-size: 80px;
            margin-bottom: 20px;
        }

        .no-results h2 {
            font-size: 2em;
            margin-bottom: 10px;
        }

        .no-results p {
            color: rgba(255, 255, 255, 0.7);
            font-size: 1.1em;
        }

        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            margin-top: 60px;
        }

        .pagination a,
        .pagination span {
            padding: 12px 18px;
            background: rgba(255, 255, 255, 0.1);
            border: 2px solid rgba(255, 255, 255, 0.2);
            border-radius: 10px;
            color: #fff;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
        }

        .pagination a:hover {
            background: #a8e063;
            color: #1a4d2e;
            border-color: #a8e063;
            transform: translateY(-2px);
        }

        .pagination .active {
            background: #a8e063;
            color: #1a4d2e;
            border-color: #a8e063;
        }

        .pagination .disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        .pagination .disabled:hover {
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
            border-color: rgba(255, 255, 255, 0.2);
            transform: none;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .navbar {
                padding: 15px 20px;
                flex-direction: column;
                gap: 15px;
            }

            .nav-links {
                flex-direction: column;
                gap: 15px;
            }

            .hero h1 {
                font-size: 2em;
            }

            .filters-container,
            .products-section,
            .results-header {
                padding-left: 20px;
                padding-right: 20px;
            }

            .filters-grid {
                grid-template-columns: 1fr;
            }

            .products-grid {
                grid-template-columns: 1fr;
            }

            .search-bar {
                flex-direction: column;
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

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-badge">Boutique écologique en ligne</div>
        <h1>
            Des produits durables<br>
            pour un <span class="highlight">mode de vie responsable</span>
        </h1>
        <p>{{ $products->total() }} produits disponibles</p>
    </section>

    <!-- Search and Filters -->
    <div class="filters-container">
        <div class="search-section">
            <form method="GET" action="{{ route('products.index') }}">
                <div class="search-bar">
                    <input type="text" 
                           name="search" 
                           class="search-input"
                           placeholder="🔍 Rechercher un produit..." 
                           value="{{ request('search') }}">
                    <button type="submit" class="btn-search">Rechercher</button>
                </div>

                <div class="filters-grid">
                    <div class="filter-group">
                        <label for="category">Catégorie</label>
                        <select name="category" id="category" class="filter-select">
                            <option value="">Toutes les catégories</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" 
                                        {{ request('category') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="filter-group">
                        <label for="min_price">Prix minimum (MAD)</label>
                        <input type="number" 
                               name="min_price" 
                               id="min_price" 
                               class="filter-input"
                               placeholder="0 MAD"
                               value="{{ request('min_price') }}">
                    </div>

                    <div class="filter-group">
                        <label for="max_price">Prix maximum (MAD)</label>
                        <input type="number" 
                               name="max_price" 
                               id="max_price" 
                               class="filter-input"
                               placeholder="1000 MAD"
                               value="{{ request('max_price') }}">
                    </div>

                    <div class="filter-group">
                        <label for="sort">Trier par</label>
                        <select name="sort" id="sort" class="filter-select">
                            <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Plus récents</option>
                            <option value="price_low" {{ request('sort') == 'price_low' ? 'selected' : '' }}>Prix croissant</option>
                            <option value="price_high" {{ request('sort') == 'price_high' ? 'selected' : '' }}>Prix décroissant</option>
                            <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Nom A-Z</option>
                            <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Nom Z-A</option>
                        </select>
                    </div>
                </div>

                <div class="filter-actions">
                    <button type="submit" class="btn-filter">Appliquer les filtres</button>
                    <a href="{{ route('products.index') }}" class="btn-reset">Réinitialiser</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Results Header -->
    <div class="results-header">
        <h2 class="results-title">Nos Produits</h2>
        <div class="results-count">
            <strong>{{ $products->total() }}</strong> produit(s) trouvé(s) 
            · Page {{ $products->currentPage() }}/{{ $products->lastPage() }}
        </div>
    </div>

    <!-- Products Grid -->
    <section class="products-section">
        @if($products->count() > 0)
            <div class="products-grid">
                @foreach($products as $product)
                    <div class="product-card" onclick="window.location='{{ route('products.show', $product->id) }}'">
                        <div class="product-image-wrapper">
                            <img src="{{ $product->image_url ?? 'https://images.unsplash.com/photo-1466692476868-aef1dfb1e735?w=400' }}" 
                                 alt="{{ $product->name }}" 
                                 class="product-image">
                            
                            <div class="product-badge">{{ $product->category->name ?? 'Produit' }}</div>
                            
                            @if($product->stock > 10)
                                <div class="product-stock-badge stock-high">✓ En stock</div>
                            @elseif($product->stock > 0)
                                <div class="product-stock-badge stock-low">⚠ {{ $product->stock }} restants</div>
                            @endif
                        </div>
                        
                        <div class="product-info">
                            <h3 class="product-name">{{ $product->name }}</h3>
                            
                            @if($product->description)
                                <p class="product-description">{{ $product->description }}</p>
                            @endif
                            
                            <div class="product-footer">
                                <div class="product-price">
                                    {{ number_format($product->price, 0) }} <span>MAD</span>
                                </div>
                                <button class="btn-view">Voir détails →</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="pagination">
                @if ($products->onFirstPage())
                    <span class="disabled">← Précédent</span>
                @else
                    <a href="{{ $products->previousPageUrl() }}">← Précédent</a>
                @endif

                @foreach(range(1, $products->lastPage()) as $page)
                    @if($page == $products->currentPage())
                        <span class="active">{{ $page }}</span>
                    @else
                        <a href="{{ $products->url($page) }}">{{ $page }}</a>
                    @endif
                @endforeach

                @if ($products->hasMorePages())
                    <a href="{{ $products->nextPageUrl() }}">Suivant →</a>
                @else
                    <span class="disabled">Suivant →</span>
                @endif
            </div>
        @else
            <div class="no-results">
                <div class="no-results-icon">🔍</div>
                <h2>Aucun produit trouvé</h2>
                <p>Essayez de modifier vos critères de recherche ou de filtrage.</p>
            </div>
        @endif
    </section>

</body>
</html>