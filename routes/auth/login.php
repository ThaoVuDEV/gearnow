<?php 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

Route::get('/dang-nhap', [LoginController::class, 'showLogin'])->name('login');
Route::post('/dang-nhap', [LoginController::class, 'login']);
Route::post('/dang-xuat', [LoginController::class, 'logout'])->name('logout');;
