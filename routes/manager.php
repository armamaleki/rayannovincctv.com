<?php
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('manager.index');
});

Route::prefix('user')->name('user.')->group(function () {
    Route::get('/',[\App\Http\Controllers\Manager\UserController::class , 'index'])->name('index');
});

Route::prefix('role')->name('role.')->group(function () {
    Route::get('/',[\App\Http\Controllers\Manager\RoleController::class , 'index'])->name('index');
    Route::get('/create',[\App\Http\Controllers\Manager\RoleController::class , 'create'])->name('create');
    Route::post('/store',[\App\Http\Controllers\Manager\RoleController::class , 'store'])->name('store');
    Route::get('/edit/{role}',[\App\Http\Controllers\Manager\RoleController::class , 'edit'])->name('edit');
    Route::put('/update/{role}',[\App\Http\Controllers\Manager\RoleController::class , 'update'])->name('update');
});
