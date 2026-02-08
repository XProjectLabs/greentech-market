<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\VisitorProductController;  // NEW
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

// ========== PUBLIC ROUTES (VISITORS) ==========

// Home page
Route::get('/', [HomeController::class, 'index'])->name('home');

// Products - Visitor pages (using VisitorProductController)
Route::get('/products', [VisitorProductController::class, 'index'])->name('products.index');
Route::get('/products/{id}', [VisitorProductController::class, 'show'])->name('products.show');

// ========== ADMIN ROUTES ==========

Route::prefix('admin')->name('admin.')->group(function() {

    // Dashboard
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');

    // Products CRUD (Admin)
    Route::get('/products', [AdminController::class, 'products'])->name('products');
    
    // Product Create & Store (using your existing ProductController)
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    
    // Product Edit, Update & Delete (using AdminController)
    Route::get('/products/{id}/edit', [AdminController::class, 'editProduct'])->name('products.edit');
    Route::put('/products/{id}', [AdminController::class, 'updateProduct'])->name('products.update');
    Route::delete('/products/{id}', [AdminController::class, 'deleteProduct'])->name('products.delete');

    // Users
    Route::get('/users', function() { return view('admin.users'); })->name('users');

});