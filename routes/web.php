<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('auth' , function () {
    return view('auth.login');
})->name('login');

Route::get('/', function () {
    return view('client.index');
})->name('home');

