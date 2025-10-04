<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;

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
    Route::get('/{product}/data-sheet/download', function (product $product) {
        $media = $product->getFirstMedia('data_sheet');
        if (!$media) {
            abort(404);
        }
        return response()->download($media->getPath(), $product->slug . '.pdf');
    })->name('data-sheet.download')->middleware('signed');
});

Route::group(['middleware' => ['web', 'auth'], 'prefix' => 'purchase'], function () {
    Route::post('/order/{order}/purchase', [\App\Http\Controllers\OrderPurchaseController::class, 'purchase'])->name('purchase');
    Route::get('/order/{order}/purchase/result', [\App\Http\Controllers\OrderPurchaseController::class, 'result'])->name('purchase.result');
});

Route::get('/cart', [\App\Http\Controllers\Client\CartController::class, 'index'])->name('cart');
Route::post('/cart/store', [\App\Http\Controllers\Client\CartController::class, 'store'])->name('cart.store');

Route::get('/checkout', [\App\Http\Controllers\Client\CheckoutController::class, 'index'])->name('checkout');
Route::post('/checkout/remove-item', [\App\Http\Controllers\Client\CheckoutController::class, 'remove'])->name('checkout.remove-item');


Route::prefix('dashboard')->middleware('auth')->name('dashboard.')->group(function () {
    Route::get('/', [App\Http\Controllers\Client\Dashboard\DashboardController::class, 'index'])->name('index');
    Route::get('/orders', [App\Http\Controllers\Client\Dashboard\DashboardController::class, 'orders'])->name('orders');
    Route::get('/transactions', [App\Http\Controllers\Client\Dashboard\DashboardController::class, 'transactions'])->name('transactions');
});

