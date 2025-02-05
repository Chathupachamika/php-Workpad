<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/register');
});


Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        $products = \App\Models\Product::all();
        return view('dashboard', compact('products'));
    })->name('dashboard');

    // Profile routes
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });

    // Product routes
    Route::controller(ProductController::class)->group(function () {
        // Main product routes
        Route::get('/products', 'index')->name('product.index');
        Route::get('/products/create', 'create')->name('product.create');
        Route::post('/products', 'store')->name('product.store');
        Route::get('/products/{product}/edit', 'edit')->name('product.edit');
        Route::put('/products/{product}', 'update')->name('product.update');
        Route::delete('/products/{product}', 'destroy')->name('product.destroy');

        // Recycle bin routes
        Route::get('/products/recycle-bin', 'recycleBin')->name('product.recycle-bin');
        Route::post('/products/{product}/restore', 'restore')->name('product.restore');
        Route::delete('/products/{product}/permanent-delete', 'permanentDelete')->name('product.permanent-delete');
    });

    // Customer routes
    Route::controller(CustomerController::class)->group(function () {
        Route::get('/customers', 'index')->name('customer.index');
        Route::post('/customers', 'store')->name('customer.store');
        Route::put('/customers/{customer}', 'update')->name('customer.update');
        Route::delete('/customers/{customer}', 'destroy')->name('customer.destroy');
    });
});
