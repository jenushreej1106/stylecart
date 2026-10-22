<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\MyOrderController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DashboardController;



/*
|--------------------------------------------------------------------------
| Home
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('products.index');
})->name('home');


/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');


/*
|--------------------------------------------------------------------------
| Products
|--------------------------------------------------------------------------
*/

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


/*
|--------------------------------------------------------------------------
| Categories
|--------------------------------------------------------------------------
*/

Route::get('/categories', [CategoryController::class, 'index'])
    ->name('categories.index');

Route::get('/categories/create', [CategoryController::class, 'create'])
    ->name('categories.create');

Route::post('/categories', [CategoryController::class, 'store'])
    ->name('categories.store');


/*
|--------------------------------------------------------------------------
| Shopping Cart
|--------------------------------------------------------------------------
*/

Route::get('/cart', [CartController::class, 'index'])
    ->name('cart.index');

Route::post('/cart/add/{product}', [CartController::class, 'add'])
    ->name('cart.add');

Route::patch('/cart/update/{id}', [CartController::class, 'update'])
    ->name('cart.update');

Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])
    ->name('cart.remove');


/*
|--------------------------------------------------------------------------
| Wishlist
|--------------------------------------------------------------------------
*/

Route::get('/wishlist', [WishlistController::class, 'index'])
    ->name('wishlist.index');

Route::post('/wishlist/add/{product}', [WishlistController::class, 'add'])
    ->name('wishlist.add');

Route::delete('/wishlist/remove/{product}', [WishlistController::class, 'remove'])
    ->name('wishlist.remove');


/*
|--------------------------------------------------------------------------
| Checkout
|--------------------------------------------------------------------------
*/

Route::get('/checkout', [CheckoutController::class, 'index'])
    ->name('checkout.index');

Route::post('/checkout', [CheckoutController::class, 'store'])
    ->name('checkout.store');

Route::get('/checkout/success/{id}', [CheckoutController::class, 'success'])
    ->name('checkout.success');


/*
|--------------------------------------------------------------------------
| Customer Orders
|--------------------------------------------------------------------------
*/

Route::get('/my-orders', [MyOrderController::class, 'index'])
    ->name('my-orders.index');


/*
|--------------------------------------------------------------------------
| Admin Order Management
|--------------------------------------------------------------------------
*/

Route::get('/orders', [OrderController::class, 'index'])
    ->name('orders.index');

Route::get('/orders/{id}', [OrderController::class, 'show'])
    ->name('orders.show');

Route::patch('/orders/{id}/status', [OrderController::class, 'updateStatus'])
    ->name('orders.updateStatus');