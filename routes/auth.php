<?php

use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('register', [Auth\RegisterController::class, 'create'])->name('register');
    Route::post('register', [Auth\RegisterController::class, 'store']);

    Route::get('login', [Auth\LoginController::class, 'create'])->name('login');
    Route::post('login', [Auth\LoginController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::match(['get', 'post'], 'logout', Auth\LogoutController::class)->name('logout');
});
