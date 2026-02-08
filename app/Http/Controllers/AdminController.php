<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // ========== DASHBOARD ==========
    public function index()
    {
        // Get latest 4 products
        $products = Product::with('category')
            ->orderBy('id', 'desc')
            ->take(4)
            ->get();

        // Calculate statistics
        $totalProducts = Product::count();
        // $totalUsers = User::count();
        
        $plantsCount = Product::whereHas('category', function($query) {
            $query->where('name', 'Plantes');
        })->count();
        
        $grainesCount = Product::whereHas('category', function($query) {
            $query->where('name', 'Graines');
        })->count();

        return view('admin.dashboard', compact(
            'products',
            'totalProducts',
            'plantsCount',
            'grainesCount'
        ));
    }

    // ========== READ - Display all products ==========
    public function products()
    {
        // Get all products from database with their categories
        $products = Product::with('category')
            ->orderBy('id', 'desc')
            ->get();
        
        // Send products to the view
        return view('admin.products', compact('products'));
    }

    // ========== CREATE - Show create form ==========
    public function createProduct()
    {
        // Get all categories for the dropdown
        $categories = Category::all();
        
        // Show the create form
        return view('products.create', compact('categories'));
    }

    // ========== CREATE - Save new product ==========
    public function storeProduct(Request $request)
    {
        // Validate the data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'image_url' => 'nullable|url',
        ]);

        // Create new product in database
        Product::create($validated);

        // Redirect back to products list with success message
        return redirect()->route('admin.products')
            ->with('success', 'Produit ajouté avec succès');
    }

    // ========== UPDATE - Show edit form ==========
    public function editProduct($id)
    {
        // Find the product or show 404 error
        $product = Product::findOrFail($id);
        
        // Get all categories for the dropdown
        $categories = Category::all();
        
        // Show the edit form with product data
        return view('admin.products-edit', compact('product', 'categories'));
    }

    // ========== UPDATE - Save changes ==========
    public function updateProduct(Request $request, $id)
    {
        // Find the product
        $product = Product::findOrFail($id);

        // Validate the data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'image_url' => 'nullable|url',
        ]);

        // Update the product
        $product->update($validated);

        // Redirect back with success message
        return redirect()->route('admin.products')
            ->with('success', 'Produit modifié avec succès');
    }

    // ========== DELETE - Remove product ==========
    public function deleteProduct($id)
    {
        // Find the product
        $product = Product::findOrFail($id);
        
        // Delete it from database
        $product->delete();
        
        // Redirect back with success message
        return redirect()->route('admin.products')
            ->with('success', 'Produit supprimé avec succès');
    }
}