@extends('admin.layout')

@section('title', 'Modifier le produit')

@section('content')
<h1 class="page-title">Modifier le produit</h1>

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

<div style="max-width: 600px;">
    <form action="{{ route('admin.products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div style="margin-bottom: 15px;">
            <label for="name" style="display: block; margin-bottom: 5px; font-weight: bold;">Nom du produit *</label>
            <input type="text" 
                   id="name" 
                   name="name" 
                   value="{{ old('name', $product->name) }}"
                   required
                   style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="description" style="display: block; margin-bottom: 5px; font-weight: bold;">Description</label>
            <textarea id="description" 
                      name="description" 
                      rows="4"
                      style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">{{ old('description', $product->description) }}</textarea>
        </div>

        <div style="margin-bottom: 15px;">
            <label for="category_id" style="display: block; margin-bottom: 5px; font-weight: bold;">Catégorie *</label>
            <select id="category_id" 
                    name="category_id" 
                    required
                    style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
                <option value="">-- Sélectionner une catégorie --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" 
                            {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div style="margin-bottom: 15px;">
            <label for="price" style="display: block; margin-bottom: 5px; font-weight: bold;">Prix (MAD) *</label>
            <input type="number" 
                   id="price" 
                   name="price" 
                   value="{{ old('price', $product->price) }}"
                   step="0.01" 
                   min="0"
                   required
                   style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="stock" style="display: block; margin-bottom: 5px; font-weight: bold;">Stock *</label>
            <input type="number" 
                   id="stock" 
                   name="stock" 
                   value="{{ old('stock', $product->stock) }}"
                   min="0"
                   required
                   style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="image_url" style="display: block; margin-bottom: 5px; font-weight: bold;">URL de l'image</label>
            <input type="url" 
                   id="image_url" 
                   name="image_url" 
                   value="{{ old('image_url', $product->image_url) }}"
                   placeholder="https://example.com/image.jpg"
                   style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
            @if($product->image_url)
                <div style="margin-top: 10px;">
                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}" style="max-width: 150px; border-radius: 4px;">
                </div>
            @endif
        </div>

        <div style="margin-top: 20px;">
            <button type="submit" 
                    class="btn-add" 
                    style="padding: 10px 20px; background: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer;">
                Enregistrer les modifications
            </button>
            <a href="{{ route('admin.products') }}" 
               style="margin-left: 10px; padding: 10px 20px; background: #6c757d; color: white; text-decoration: none; border-radius: 4px; display: inline-block;">
                Annuler
            </a>
        </div>
    </form>
</div>

@endsection