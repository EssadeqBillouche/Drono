<?php

use App\Presentation\Http\Controllers\Auth\ClientController;
use App\Presentation\Http\Controllers\Auth\SellerController;
use Illuminate\Support\Facades\Route;
use App\Presentation\Http\Controllers\ProductController;

// Test route
Route::get('/test', function () {
    throw new Exception('Test exception for Telescope');
});

Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/seller/dashboard', [SellerController::class, 'dashboard'])->name('seller.dashboard'); // Corrected route name


Route::prefix('Authentication')->group(function () {
    // Client Authentication
    Route::prefix('client')->group(function () {
        Route::get('/register', function () {return view('Auth.register');})->name('client.register.view');
        Route::post('/register', [ClientController::class, 'store'])->name('registerClient');
    });
    Route::get('/login', function () { return view('Auth.Login'); })->name('login');
    Route::get('/ResetPassword', function () { return view('Auth.ResetPassword');})->name('ResetPassword');
    // Seller Authentication
    Route::prefix('seller')->group(function () {
        Route::get('/register', function () {
            return view('Auth.register-seller');
        })->name('registerSeller');

        Route::post('/register', [SellerController::class, 'store'])->name('Auth.register-seller');
    });

});

// Authenticated Routes
Route::get('/profile', function () {
    return view('Client.ClientProfile');
})->name('ClientProfile');

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/cart', function () {
    return view('cart');
})->name('cart');

Route::get('/catalog', function () {
    return view('catalog');
})->name('catalog');

Route::prefix('checkout')->group(function () {
    Route::get('/', function () {
        return view('checkout');
    })->name('checkout');

    Route::get('/shipping', function () {
        return view('checkout.shipping');
    })->name('checkout.shipping');
});

// Seller routes (add these)
Route::get('/seller/products', [SellerController::class, 'products'])->name('seller.products');
Route::get('/seller/orders', [SellerController::class, 'orders'])->name('seller.orders');
Route::get('/seller/analytics', [SellerController::class, 'analytics'])->name('seller.analytics');
Route::get('/seller/customers', [SellerController::class, 'customers'])->name('seller.customers');
Route::get('/seller/reviews', [SellerController::class, 'reviews'])->name('seller.reviews');
Route::get('/seller/settings', [SellerController::class, 'settings'])->name('seller.settings');
Route::get('/seller', [SellerController::class, 'index'])->name('seller.dashboard');

Route::get('addProduct', [ProductController::class, 'index'])->name('products.index');
Route::Post('/Products', [ProductController::class, 'store'])->name('product.store');

Route::get('/Products', [ProductController::class, 'product'])->name('seller.Product');
Route::get('Orders', [ProductController::class, 'orders'])->name('seller.Product');




// Logout route
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
