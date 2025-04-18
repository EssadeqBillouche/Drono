<?php

use App\Presentation\Http\Controllers\Auth\ClientController;
use App\Presentation\Http\Controllers\Auth\SellerController;
use App\Presentation\Http\Controllers\Auth\UserController;
use Illuminate\Support\Facades\Route;
use App\Presentation\Http\Controllers\ProductController;

// Test route
Route::get('/test', function () {
    throw new Exception('Test exception for Telescope');
});

Route::get('/seller/dashboard', [SellerController::class, 'dashboard'])->name('seller.dashboard'); // Corrected route name


// client routes


Route::prefix('client')->group(function () {
    route::get('/Logout', function () {})->name('logout');
    Route::get('/preferences', function () {})->name('profile.preferences]x');
    Route::post('/products', [ClientController::class, 'update'])->name('profile.update');
    Route::get('/password-update', [ClientController::class, 'index'])->name('password.update');

    Route::post('/two-factor/enable', [ClientController::class, 'enableTwoFactor'])->name('two-factor.enable');
});


// order routes
Route::prefix('order')->group(function () {
    Route::get('/create', function () {})->name('order.create');
    Route::post('/create', function () {})->name('order.create');
    Route::get('/history', function () {})->name('order.history');
    Route::get('/{id}', function () {})->name('orders.show');
});

// Address Routes
Route::prefix('address')->group(function () {
    Route::get('/create', function () {})->name('address.create');
    Route::post('/create', function () {})->name('addresses.store');
    Route::get('/history', function () {})->name('profile.partials.addresses');
    Route::get('/{id}', function () {})->name('address.show');
    Route::post('/', function () {})->name('notifications.update');
});

// payment method route

Route::prefix('payment')->group(function () {
    Route::get('/create', function () {})->name('payment.create');
    Route::post('/create', function () {})->name('payment-methods.store');
    Route::get('/history', function () {})->name('profile.partials.payment');
    Route::get('/{id}', function () {})->name('payment.show');
});
Route::prefix('Authentication')->group(function () {
    // Client Authentication
    Route::prefix('client')->group(function () {
        Route::get('/register', function () {return view('Auth.register');})->name('client.register.view');
        Route::post('/register', [ClientController::class, 'store'])->name('registerClient');
    });
    Route::get('/login', [UserController::class, 'login'])->name('login');
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
