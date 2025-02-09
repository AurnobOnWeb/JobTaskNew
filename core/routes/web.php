<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Admin
Route::prefix('admin')->group(function () {
    Route::get('/login', [App\Http\Controllers\Admin\AuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [App\Http\Controllers\Admin\AuthController::class, 'login']);
    Route::post('/logout', [App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('admin.logout');

    Route::middleware('admin')->group(function () {
        Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');
    });
});


//Merchant
Route::prefix('merchant')->group(function () {
    Route::get('/login', [App\Http\Controllers\Merchant\AuthController::class, 'showLoginForm'])->name('merchant.login');
    Route::post('/login', [App\Http\Controllers\Merchant\AuthController::class, 'login']);
    Route::post('/logout', [App\Http\Controllers\Merchant\AuthController::class, 'logout'])->name('merchant.logout');
    Route::get('/login', [App\Http\Controllers\Merchant\AuthController::class, 'showLoginForm'])->name('merchant.login');
    Route::get('/register', [App\Http\Controllers\Merchant\AuthController::class, 'showRegistrationForm'])->name('merchant.register');
    Route::post('/register', [App\Http\Controllers\Merchant\AuthController::class, 'register'])->name('merchant.register.submit');

    Route::middleware('merchant')->group(function () {
        Route::get('/dashboard', [App\Http\Controllers\Merchant\DashboardController::class, 'index'])->name('merchant.dashboard');
    });
});
