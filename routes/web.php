<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('auth', function () {
    return view('auth.login');
})->name('login');

Route::name('client.')->group(function () {
    Route::get('/', function () {
        return view('client.index');
    })->name('home');

    Route::get('/about-us', function () {
        return view('client.about-us');
    })->name('about-us');

    Route::get('/contact-us', function () {
        return view('client.contact-us');
    })->name('contact-us');

    Route::get('/faq', function () {
        return view('client.faq');
    })->name('faq');

    Route::get('/privacy-policy', function () {
        return view('client.privacy-policy');
    })->name('privacy-policy');

    Route::get('/articles', [\App\Http\Controllers\Client\ArticleController::class, 'index'])->name('articles.index');
    Route::get('/articles/{article}', [\App\Http\Controllers\Client\ArticleController::class, 'show'])->name('articles.show');

    Route::get('/store', [\App\Http\Controllers\Client\StoreController::class, 'index'])->name('store.index');
    Route::get('/store/{product}', [\App\Http\Controllers\Client\StoreController::class, 'show'])->name('store.show');


    Route::get('/checkout', [\App\Http\Controllers\Client\CheckoutController::class, 'index'])->name('checkout');
    Route::post('/checkout/remove-item', [\App\Http\Controllers\Client\CheckoutController::class, 'remove'])->name('checkout.remove-item');


    Route::get('/cart', [\App\Http\Controllers\Client\CartController::class, 'index'])->name('cart');
    Route::post('/cart/store', [\App\Http\Controllers\Client\CartController::class, 'store'])->name('cart.store');

});

Route::group(['middleware' => ['web', 'auth'], 'prefix' => 'purchase'], function () {
    Route::post('/order/{order}/purchase', [\App\Http\Controllers\OrderPurchaseController::class, 'purchase'])->name('purchase');
    Route::get('/order/{order}/purchase/result', [\App\Http\Controllers\OrderPurchaseController::class, 'result'])->name('purchase.result');
});

