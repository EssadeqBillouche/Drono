<?php

use App\Presentation\Http\Controllers\Auth\ClientController;
use App\Presentation\Http\Controllers\Auth\SellerController;
use App\Presentation\Http\Controllers\Auth\UserController;
use App\Presentation\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Test route
Route::get('/test', function () {
    throw new Exception('Test exception for Telescope');
});


// Authentication Routes
Route::prefix('Authentication')->group(function () {
    Route::post('/login', [UserController::class, 'login'])->name('login');
    Route::get('/login', function () { return view('Auth.login');})->name('login-View');
    Route::get('/ResetPassword', function () { return view('Auth.ResetPassword');})->name('ResetPassword');

    // Client Authentication
    Route::prefix('client')->group(function () {
        Route::get('/register', function () {return view('Auth.register');})->name('client.register.view');
        Route::post('/register', [ClientController::class, 'store'])->name('registerClient');
    });

    // Seller Authentication
    Route::prefix('seller')->group(function () {
        Route::get('/register', function () { return view('Auth.register-seller'); })->name('registerSeller');
        Route::post('/register', [SellerController::class, 'store'])->name('Auth.register-seller');
    });
});

// Client Routes
Route::prefix('client')->group(function () {
    Route::get('/Logout', function () {})->name('logout'); // Consider renaming to logout
    Route::get('/preferences', function () {})->name('profile.preferences]x'); // Fix typo, probably 'profile.preferences'
    Route::post('/products', [ClientController::class, 'update'])->name('profile.update'); // Consider more descriptive name
    Route::get('/password-update', [ClientController::class, 'index'])->name('password.update'); // Consider more descriptive name and method (GET for update?)
    Route::post('/two-factor/enable', [ClientController::class, 'enableTwoFactor'])->name('two-factor.enable');
});

// Product Routes
Route::prefix('product')->group(function () {
    Route::get('/{id}', [ProductController::class, 'show'])->name('products.show');
    Route::post('/', [ProductController::class, 'update'])->name('product.store'); // POST method for 'store' is unconventional. Consider 'product.create'
});



// Order Routes
Route::prefix('order')->group(function () {
    Route::match(['get', 'post'], '/create', function () {})->name('order.create'); // Combine get and post
    Route::get('/history', function () {})->name('order.history');
    Route::get('/{id}', function () {})->name('orders.show');
});

// Address Routes
Route::prefix('address')->group(function () {
    Route::get('/create', function () {})->name('address.create');
    Route::post('/create', function () {})->name('addresses.store'); // Consider using consistent naming ('address.store')
    Route::get('/history', function () {})->name('profile.partials.addresses'); // Consider a more general route name like 'addresses.index'
    Route::get('/{id}', function () {})->name('address.show');
    Route::post('/', function () {})->name('notifications.update'); // This seems misplaced in "address" routes.
});

// Payment Method Routes
Route::prefix('payment')->group(function () {
    Route::get('/create', function () {})->name('payment.create');
    Route::post('/create', function () {})->name('payment-methods.store'); // Consider using consistent naming ('payment.store')
    Route::get('/history', function () {})->name('profile.partials.payment'); // Consider a more general route name like 'payments.index' or 'payment.history'
    Route::get('/{id}', function () {})->name('payment.show');
});

// Seller Dashboard Route (Move closer to other seller routes)
Route::get('/seller/dashboard', [SellerController::class, 'dashboard'])->name('seller.dashboard');
Route::get('/seller/products', [SellerController::class, 'products'])->name('seller.products');
Route::get('/seller/orders', [SellerController::class, 'orders'])->name('seller.orders');
Route::get('/seller/analytics', [SellerController::class, 'settings'])->name('seller.analytics');
Route::get('/seller/customers', [SellerController::class, 'settings'])->name('seller.customers');
Route::get('/seller/reviews', [SellerController::class, 'settings'])->name('seller.reviews');
Route::get('/seller/settings', [SellerController::class, 'settings'])->name('seller.settings');



// General/Public Routes
Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/cart', function () {
    return view('cart');
})->name('cart');

Route::get('/catalog', [ProductController::class, 'index'])->name('catalog'); // 'products.index' might be better

// Checkout Routes
Route::prefix('checkout')->group(function () {
    Route::get('/', function () { return view('checkout'); })->name('checkout'); // 'checkout.index' might be better
    Route::get('/shipping', function () { return view('checkout.shipping'); })->name('checkout.shipping');
});

// Authenticated Profile Route
Route::get('/profile', function () { return view('Client.ClientProfile'); })->name('ClientProfile'); // 'client.profile' for consistency


