<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/dang-ky', [RegisterController::class, 'register'])->name('register');
Route::post('/dang-ky', [RegisterController::class, 'store'])->name('register.store');
