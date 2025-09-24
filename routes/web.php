<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('auth' , function () {
    return view('auth.login');
})->name('login');

Route::name('client.')->group(function () {
    Route::get('/', function () {
        return view('client.index');
    })->name('home');

    Route::get('/about-us', function () {
        return view('client.about-us');
    })->name('about-us');

});
