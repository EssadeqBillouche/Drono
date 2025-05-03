<?php

use App\Presentation\Http\Controllers\Auth\ClientController;
use App\Presentation\Http\Controllers\Auth\SellerController;
use App\Presentation\Http\Controllers\Auth\UserController;
use App\Presentation\Http\Controllers\CheckoutController;
use App\Presentation\Http\Controllers\OrderController;
use App\Presentation\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::post('/checkout/process-payment', [CheckoutController::class, 'processPayment'])
    ->name('checkout.process-payment');
Route::get('/order/confirmation/{id}', [OrderController::class, 'confirmation'])
    ->name('order.confirmation');

// General/Public Routes
Route::get('/', function () {
    return view('Index');
})->name('index');



Route::get('/about', function () {
    return view('aboutUs');
})->name('about');

Route::get('/contact', function () {
    return view('contactUs');
})->name('contact');

Route::get('/cart', function () {
    return view('cart');
})->name('cart');

Route::get('/Confirmation', function () {
    return view('ConfirmationOrder');
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
    // Profile and preferences
    Route::get('profile', function () {
        return view('Client.ClientProfile');
    })->name('profile');
    Route::get('preferences', function () {
        return view('Client.Preferences');
    })->name('profile.preferences');

    Route::get('/orders', function () {})->name('orders');
    Route::get('/addresses', function () {})->name('addresses');
    Route::get('/payments', function () {})->name('wishlist');

    // Profile security and 2FA
    Route::prefix('profile/security')->group(function () {
        Route::post('two-factor', [ClientController::class, 'enableTwoFactor'])
            ->name('two-factor.enable');
        Route::delete('two-factor', [ClientController::class, 'disableTwoFactor'])
            ->name('two-factor.disable');
        Route::get('two-factor/status', [ClientController::class, 'getTwoFactorStatus'])
            ->name('two-factor.status');
    });

    // Other routes
    Route::get('password', [ClientController::class, 'showPasswordForm'])
        ->name('password.update');
    Route::put('profile', [ClientController::class, 'update'])
        ->name('profile.update');
    Route::post('logout', [UserController::class, 'logout'])
        ->name('logout');
});
// Product Routes
Route::prefix('product')->group(function () {
    Route::get('/{id}', [ProductController::class, 'show'])->name('products.show');
    Route::post('/', [ProductController::class, 'store'])->name('product.store'); // POST method for 'store' is unconventional. Consider 'product.create'
});

// Order Routes
Route::prefix('order')->group(function () {
    Route::post('/order', [OrderController::class, 'create'])->name('order.create'); // Combine get and post
    Route::get('/history', function () {})->name('order.history');
    Route::get('/confirmation', [OrderController::class, 'confirmation'])->name('order.confirmation');
    Route::get('/{id}', function () {})->name('orders.show');
    Route::get('/track', function () {})->name('order.track');
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
Route::prefix('seller')->group(function () {
    Route::get('/dashboard', [SellerController::class, 'index'])->name('seller.dashboard');
    Route::get('/products', [SellerController::class, 'products'])->name('seller.products');
    Route::get('/orders', [SellerController::class, 'orders'])->name('seller.orders');
    Route::get('/analytics', [SellerController::class, 'analytics'])->name('seller.analytics');
    Route::get('/customers', [SellerController::class, 'customer'])->name('seller.customers');
    Route::get('/reviews', [SellerController::class, 'settings'])->name('seller.reviews');
    Route::get('/settings', [SellerController::class, 'settings'])->name('seller.settings');
});

Route::get('/seller/{id}', [SellerController::class, 'show'])->name('seller.show');

Route::get('/catalog', [ProductController::class, 'index'])->name('catalog'); // 'products.index' might be better

// Checkout Routes

Route::get('/checkout',[CheckoutController::class, 'show'] )->name('checkout'); // 'checkout.index' might be better

// Authenticated Profile Route
Route::get('/profile', function () { return view('Client.ClientProfile'); })->name('ClientProfile'); // 'client.profile' for consistency


