<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;

// Home
Route::get('/', function () {
    return redirect()->route('products.index');
});

// Product Routes
Route::get('/products', [ProductController::class, 'index'])
    ->name('products.index');

Route::get('/products/create', [ProductController::class, 'create'])
    ->name('products.create');

Route::post('/products', [ProductController::class, 'store'])
    ->name('products.store');

Route::get('/products/{product}/edit', [ProductController::class, 'edit'])
    ->name('products.edit');

Route::put('/products/{product}', [ProductController::class, 'update'])
    ->name('products.update');

Route::delete('/products/{product}', [ProductController::class, 'destroy'])
    ->name('products.destroy');

// Category Routes
Route::get('/categories', [CategoryController::class, 'index'])
    ->name('categories.index');

Route::get('/categories/create', [CategoryController::class, 'create'])
    ->name('categories.create');

Route::post('/categories', [CategoryController::class, 'store'])
    ->name('categories.store');

// Shopping Cart Routes
Route::get('/cart', [CartController::class, 'index'])
    ->name('cart.index');

Route::post('/cart/add/{product}', [CartController::class, 'add'])
    ->name('cart.add');

Route::patch('/cart/update/{id}', [CartController::class, 'update'])
    ->name('cart.update');

Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])
    ->name('cart.remove');