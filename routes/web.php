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

    Route::get('/articles', [\App\Http\Controllers\Client\ArticleController::class, 'index'])->name('articles.index');
    Route::get('/articles/{slug}', [\App\Http\Controllers\Client\ArticleController::class, 'show'])->name('articles.show');

    Route::get('/store', [\App\Http\Controllers\Client\StoreController::class, 'index'])->name('store.index');

});
