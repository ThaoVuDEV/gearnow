<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::prefix('quan-ly')
    ->middleware(['auth', 'admin.access'])
    ->group(function () {
        Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('/nguoi-dung', [AdminController::class, 'listUser'])->name('userManager');
    });
