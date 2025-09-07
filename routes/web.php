<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('auth' , function () {
    return view('auth.login');
});

Route::get('/', function () {
    return Inertia::render('welcome');
})->name('home');

