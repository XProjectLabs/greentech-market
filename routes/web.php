<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\VisitorProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// ========== PUBLIC ROUTES (VISITORS) ==========

// Home page
Route::get('/', [HomeController::class, 'index'])->name('home');

// Products - Visitor pages
Route::get('/products', [VisitorProductController::class, 'index'])->name('products.index');
Route::get('/products/{id}', [VisitorProductController::class, 'show'])->name('products.show');

// ========== AUTHENTICATION ROUTES ==========

// Guest only routes (not logged in)
Route::middleware('guest')->group(function () {
    // Login
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate'])->name('login.authenticate');
    
    // Register
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.store');
});

// Authenticated users only
Route::middleware('auth')->group(function () {
    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    // Profile
    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
});

// ========== ADMIN ROUTES ==========

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function() {

    // Dashboard
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');

    // Products Management
    Route::get('/products', [AdminController::class, 'products'])->name('products');
    
    // Product Create & Store
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    
    // Product Edit, Update & Delete
    Route::get('/products/{id}/edit', [AdminController::class, 'editProduct'])->name('products.edit');
    Route::put('/products/{id}', [AdminController::class, 'updateProduct'])->name('products.update');
    Route::delete('/products/{id}', [AdminController::class, 'deleteProduct'])->name('products.delete');

    // Users
    Route::get('/users', function() { return view('admin.users'); })->name('users');

});