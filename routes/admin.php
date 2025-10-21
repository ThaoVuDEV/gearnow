<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::prefix('quan-ly')
    ->middleware(['auth', 'admin.access'])
    ->group(function () {
        Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('/nguoi-dung', [AdminController::class, 'listUser'])->name('userManager');
        Route::get('/danh-muc', [AdminController::class, 'listCategory'])->name('categoryManager');
        Route::get('/danh-muc/tao-moi', [AdminController::class, 'createCategory'])->name('createCategory');
        Route::post('/danh-muc', [AdminController::class, 'storeCategory'])->name('storeCategory');
        Route::get('/danh-muc/{category}/edit', [AdminController::class, 'editCategory'])->name('editCategory');
        Route::put('/danh-muc/{category}', [AdminController::class, 'updateCategory'])->name('updateCategory');
        Route::delete('/danh-muc/{category}', [AdminController::class, 'destroyCategory'])->name('destroyCategory');
        Route::get('/san-pham', [AdminController::class, 'listProduct'])->name('productManager');
        Route::get('/san-pham/tao-moi', [AdminController::class, 'createProduct'])->name('createProduct');
        Route::post('/san-pham', [AdminController::class, 'storeProduct'])->name('storeProduct');
        Route::get('/san-pham/{product}/edit', [AdminController::class, 'editProduct'])->name('editProduct');
        Route::put('/san-pham/{product}', [AdminController::class, 'updateProduct'])->name('updateProduct');
        Route::delete('/san-pham/{product}', [AdminController::class, 'destroyProduct'])->name('destroyProduct');
    });
