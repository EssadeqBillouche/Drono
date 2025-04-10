<?php

use App\Presentation\Http\Controllers\Auth\ClientController;
use App\Presentation\Http\Controllers\Auth\SellerController;
use Illuminate\Support\Facades\Route;


// Test route
Route::get('/test', function () {
    throw new Exception('Test exception for Telescope');
});

// Authentication Routes
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

