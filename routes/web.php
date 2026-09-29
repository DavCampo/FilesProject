<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});
Route::get('/register', function () {
    return view('register');
});
Route::prefix('auth')->group(
    function () {
        Route::post('/login', [AuthController::class, 'login'])->name('login');
        Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
        Route::get('/login', [AuthController::class, 'loginIndex'])->name('login');
        Route::get('/register', [AuthController::class, 'registerIndex'])->name('register.form');
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
