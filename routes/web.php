<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Password;

use Laravel\Socialite\Facades\Socialite;


Route::get('/', [AuthController::class, 'showLogin'])->name('login');

Route::get('login', [AuthController::class, 'showLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showRegister'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('forgot-password', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('reset-password/{token}', [AuthController::class, 'showResetPasswordForm'])->name('password.reset');
Route::post('reset-password', [AuthController::class, 'resetPassword'])->name('password.update');


Route::middleware('auth')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('profile', [DashboardController::class, 'profile'])->name('profile');
    
    // routes for products
    Route::get('categories/index', [CategoryController::class, 'index'])->name('categories.index');
    Route::post('categories/store', [CategoryController::class, 'ajaxStore'])->name('categories.ajaxStore');
    Route::put('categories/update/{category}', [CategoryController::class, 'ajaxUpdate'])->name('categories.ajaxUpdate');
    Route::delete('categories/destroy/{category}', [CategoryController::class, 'ajaxDestroy'])->name('categories.ajaxDestroy');
    
    // routes for products
    Route::get('products/index', [ProductController::class, 'index'])->name('products.index');
    Route::get('products/{product}', [ProductController::class, 'show'])->name('products.show');
    Route::post('products/store', [ProductController::class, 'ajaxStore'])->name('products.ajaxStore');
    Route::put('products/update/{product}', [ProductController::class, 'ajaxUpdate'])->name('products.ajaxUpdate');
    Route::delete('products/destroy/{product}', [ProductController::class, 'ajaxDestroy'])->name('products.ajaxDestroy');
    
});


Route::get('login/google', [AuthController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback', [AuthController::class, 'handleGoogleCallback']);