<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Product;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Public routes
Route::redirect('/', '/login');

// Authentication routes
Route::controller(AuthController::class)->group(function () {
    Route::get('/register', 'showRegister')->name('register');
    Route::post('/register', 'register');
    Route::get('/login', 'showLogin')->name('login');
    Route::post('/login', 'login');
    Route::post('/logout', 'logout')->name('logout')->middleware('auth');
});

// Protected routes
Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [ProductController::class, 'dashboard'])->name('dashboard');
    
    // Product resource routes
    Route::prefix('product')->name('product.')->group(function () {
        // Public product actions (accessible by all authenticated users)
        Route::get('/edit/{product}', [ProductController::class, 'edit'])->name('edit');
        Route::post('/update/{product}', [ProductController::class, 'update'])->name('update');
        Route::post('/delete/{product}', [ProductController::class, 'destroy'])->name('delete');
        
        // Admin-only product actions
        Route::middleware(['role:admin'])->group(function () {
            Route::get('/create', [ProductController::class, 'create'])->name('add_product');
            Route::post('/store', [ProductController::class, 'store'])->name('store');
        });
    });
});