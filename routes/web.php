<?php

use Illuminate\Support\Facades\Route;

Route::get('/test', function () {
    throw new Exception('Test exception for Telescope');
});

Route::get('/profile', function () { return view('Index'); })->name('home');

Route::get('/cart', function () {return view('cart');})->name('cart');

Route::get('/catalog', function () {return view('catalog');})->name('catalog');



Route::get('/carddd', function () {return view('Index');})->name('checkout.shipping');


Route::get('/checkout', function () {return view('checkout');})->name('checkout');


Route::get('/login', function () { return view('Auth.Login'); })->name('login');

Route::get('/register', function () {
    return view('Auth.register');
})->name('register');

Route::get('/ResetPassword', function () {
    return view('Auth.ResetPassword');
})->name('ResetPassword');

Route::get('/register-seller', function () {
    return view('Auth.register-seller');
});
