<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>GreenTech Market | Boutique Écologique</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

</head>

<body>

<x-header />
<!-- Hero -->
<section class="grid-bg py-5">
    <div class="container text-center py-5">
        <span class="badge badge-green px-4 py-2 rounded-pill">
            Boutique écologique en ligne
        </span>
        <h1 class="display-5 fw-bold mt-4">
            Des produits durables<br>
            pour un <span style="color:#b7ff5a">mode de vie responsable</span>
        </h1>

        <p class="text-white-50 mt-3 mb-4">
            Achetez des plantes, graines et outils respectueux de l’environnement,
            sélectionnés avec soin.
        </p>

        <div class="d-flex justify-content-center gap-3">
            <a href="/products" class="btn btn-green">Explorer la boutique →</a>
            <a href="/" class="btn btn-outline-green">Voir les nouveautés</a>
        </div>
    </div>
</section>

<!-- Latest Products -->
<section class="latest-products">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="fw-bold">Derniers produits disponibles</h2>
            <p class="text-muted-green">Des nouveautés sélectionnées pour un jardin durable</p>
        </div>

        <div class="row g-4">
            @forelse($products as $product)
                <div class="col-md-3">
                    <div class="product-card-natural">
                        <div class="product-img">
                            <img src="{{ $product->image_url }}" alt="{{ $product->name }}">
                        </div>
                        <div class="product-body">
                            <h6>{{ $product->name }}</h6>
                            <span class="category">{{ $product->category->name ?? 'Catégorie inconnue' }}</span>
                            <div class="price">{{ number_format($product->price, 2) }} MAD</div>
                            <a href="#" class="btn btn-green w-100 mt-3">Voir le produit</a>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center">Aucun produit disponible pour le moment.</p>
            @endforelse
        </div>
    </div>
</section>
<!-- Footer -->
<footer class="py-4 text-center text-white-50">
    <div class="container">
        © 2026 GreenTech Market — Boutique Écologique en Ligne
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>