@extends('admin.layout')

@section('title', 'Tableau de bord')

@section('content')
<h1 class="page-title">Tableau de bord</h1>

<!-- Stats -->
<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-label">Total produits</div>
        <div class="stat-value">{{ $totalProducts }}</div>
    </div>
    <div class="stat-card">
        <div class="stat-label">Total utilisateurs</div>
        <div class="stat-value">0</div>
    </div>
    <div class="stat-card">
        <div class="stat-label">Plantes</div>
        <div class="stat-value">{{ $plantsCount }}</div>
    </div>
    <div class="stat-card">
        <div class="stat-label">Graines</div>
        <div class="stat-value">{{ $grainesCount }}</div>
    </div>
</div>

<!-- Latest Products Table -->
<h2 class="page-title mt-5">Derniers produits ajoutés</h2>

<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>Image</th>
                <th>Produit</th>
                <th>Catégorie</th>
                <th>Prix</th>
                <th>Stock</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
            <tr>
                <td><img src="{{ $product->image_url ?? 'https://via.placeholder.com/50' }}" class="product-img" alt="{{ $product->name }}"></td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->category->name ?? 'Non définie' }}</td>
                <td class="price">{{ $product->price }} MAD</td>
                <td>{{ $product->stock }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="5" style="text-align: center;">Aucun produit trouvé</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection