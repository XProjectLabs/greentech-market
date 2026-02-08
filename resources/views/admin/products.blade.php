@extends('admin.layout')

@section('title', 'Produits')

@section('content')
<h1 class="page-title">Gestion des produits</h1>
<a href="{{ route('admin.products.create') }}" class="btn-add">Ajouter un produit</a>

{{-- Success message --}}
@if(session('success'))
    <div style="padding: 10px; background: #d4edda; color: #155724; margin: 10px 0; border-radius: 5px;">
        {{ session('success') }}
    </div>
@endif

{{-- Error messages --}}
@if($errors->any())
    <div style="padding: 10px; background: #f8d7da; color: #721c24; margin: 10px 0; border-radius: 5px;">
        <ul style="margin: 0; padding-left: 20px;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>Image</th>
                <th>Produit</th>
                <th>Catégorie</th>
                <th>Prix</th>
                <th>Stock</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
            <tr>
                <td>
                    <img src="{{ $product->image_url ?? 'https://via.placeholder.com/50' }}" 
                         class="product-img" 
                         alt="{{ $product->name }}">
                </td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->category->name ?? 'Non définie' }}</td>
                <td class="price">{{ $product->price }} MAD</td>
                <td>{{ $product->stock }}</td>
                <td>
                    {{-- EDIT button - goes to edit form --}}
                    <a href="{{ route('admin.products.edit', $product->id) }}" 
                       class="btn-action btn-edit">Modifier</a>
                    
                    {{-- DELETE button - submits form with DELETE method --}}
                    <form action="{{ route('admin.products.delete', $product->id) }}" 
                          method="POST" 
                          style="display: inline;"
                          onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-action btn-delete" style="border: none; cursor: pointer;">Supprimer</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" style="text-align: center;">Aucun produit trouvé</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection