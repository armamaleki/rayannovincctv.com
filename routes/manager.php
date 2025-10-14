<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('manager.index');
});

Route::prefix('user')->name('user.')->group(function () {
    Route::get('/',[\App\Http\Controllers\Manager\UserController::class , 'index'])->name('index');
    Route::get('/create',[\App\Http\Controllers\Manager\UserController::class , 'create'])->name('create');
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


    Route::post('/values' , [\App\Http\Controllers\Manager\AttributeController::class , 'getValues'])->name('value');
});


Route::prefix('product')->name('product.')->group(function () {
    Route::get('/', [\App\Http\Controllers\Manager\ProductController::class , 'index'])->name('index');
    Route::get('/create', [\App\Http\Controllers\Manager\ProductController::class , 'create'])->name('create');
    Route::post('/store', [\App\Http\Controllers\Manager\ProductController::class , 'store'])->name('store');
    Route::get('/edit/{product}',[\App\Http\Controllers\Manager\ProductController::class , 'edit'])->name('edit');
    Route::put('/update/{product}',[\App\Http\Controllers\Manager\ProductController::class , 'update'])->name('update');
    Route::post('/product/avatar/', [\App\Http\Controllers\Manager\ProductController::class, 'avatar'])->name('avatar');
    Route::post('/product/gallery/', [\App\Http\Controllers\Manager\ProductController::class, 'gallery'])->name('gallery');
    Route::delete('/product/media/{media}', [\App\Http\Controllers\Manager\ProductController::class, 'deleteAvatar'])->name('delete-avatar');
    Route::delete('/product/gallery/{media}', [\App\Http\Controllers\Manager\ProductController::class, 'deleteGallery'])->name('delete-gallery');
    Route::post('/{product}/data-sheet', [\App\Http\Controllers\Manager\ProductController::class, 'dataSheet'])->name('data-sheet');
});


Route::prefix('granite')->name('granite.')->group(function () {
    Route::get('/', [\App\Http\Controllers\Manager\GraniteController::class , 'index'])->name('index');
    Route::get('/create', [\App\Http\Controllers\Manager\GraniteController::class , 'create'])->name('create');
    Route::post('/store', [\App\Http\Controllers\Manager\GraniteController::class , 'store'])->name('store');
    Route::get('/edit/{granite}' , [\App\Http\Controllers\Manager\GraniteController::class , 'edit'])->name('edit');
    Route::put('/update/{granite}',[\App\Http\Controllers\Manager\GraniteController::class , 'update'])->name('update');
});



Route::get('projects' , function (){
    $projects =\App\Models\ProjectRequest::orderBy('created_at', 'desc')->get();
    return view('manager.projects.index', compact('projects'));
})->name('projects');


Route::post('/image-uploader', function (Request $request) {
    $request->validate([
        'upload' => 'required|image|mimes:jpg,jpeg,png,bmp,gif,svg,webp|max:2048',
    ]);
    $name = $request->upload->getClientOriginalName();
    $now = \Carbon\Carbon::now()->format('Y-m-d');
    $path = $request->file('upload')->store('images/' . $now, 'public');
    return response()->json(['fileName' => $name, 'uploaded' => 1, 'url' => '/storage/' . $path]);
})->name('imageUploader');

