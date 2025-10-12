<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;



Route::middleware(['web'])->group(function () {
    require "auth/login.php";
    require "auth/register.php";
    Route::get('/', [HomeController::class, 'index'])->name('home');
});
