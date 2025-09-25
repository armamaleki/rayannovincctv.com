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

Route::prefix('article')->name('article.')->group(function () {
    Route::get('/',[\App\Http\Controllers\Manager\ArticleController::class , 'index'])->name('index');
    Route::get('/create',[\App\Http\Controllers\Manager\ArticleController::class , 'create'])->name('create');
    Route::post('/store',[\App\Http\Controllers\Manager\ArticleController::class , 'store'])->name('store');
    Route::get('/edit/{article}',[\App\Http\Controllers\Manager\ArticleController::class , 'edit'])->name('edit');
    Route::put('/update/{article}',[\App\Http\Controllers\Manager\ArticleController::class , 'update'])->name('update');
    Route::post('/article/avatar/', [\App\Http\Controllers\Manager\ArticleController::class, 'avatar'])->name('avatar');

});

Route::prefix('value')->name('value.')->group(function () {
    Route::get('/',[\App\Http\Controllers\Manager\ValueController::class , 'index'])->name('index');
    Route::get('/create',[\App\Http\Controllers\Manager\ValueController::class , 'create'])->name('create');
    Route::post('/store',[\App\Http\Controllers\Manager\ValueController::class , 'store'])->name('store');
    Route::get('/edit/{value}',[\App\Http\Controllers\Manager\ValueController::class , 'edit'])->name('edit');
    Route::put('/update/{value}',[\App\Http\Controllers\Manager\ValueController::class , 'update'])->name('update');
});


Route::prefix('attribute')->name('attribute.')->group(function () {
    Route::get('/', [\App\Http\Controllers\Manager\AttributeController::class , 'index'])->name('index');
    Route::get('/create', [\App\Http\Controllers\Manager\AttributeController::class , 'create'])->name('create');
    Route::post('/store', [\App\Http\Controllers\Manager\AttributeController::class , 'store'])->name('store');
    Route::get('/edit/{attribute}',[\App\Http\Controllers\Manager\AttributeController::class , 'edit'])->name('edit');
    Route::put('/update/{attribute}',[\App\Http\Controllers\Manager\AttributeController::class , 'update'])->name('update');
});


Route::prefix('product')->name('product.')->group(function () {
    Route::get('/', [\App\Http\Controllers\Manager\ProductController::class , 'index'])->name('index');
    Route::get('/create', [\App\Http\Controllers\Manager\ProductController::class , 'create'])->name('create');
    Route::post('/store', [\App\Http\Controllers\Manager\ProductController::class , 'store'])->name('store');
    Route::get('/edit/{product}',[\App\Http\Controllers\Manager\ProductController::class , 'edit'])->name('edit');
    Route::put('/update/{product}',[\App\Http\Controllers\Manager\ProductController::class , 'update'])->name('update');
});
