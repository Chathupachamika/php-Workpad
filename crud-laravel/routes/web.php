<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/product', [
    ProductController::class, 'index'
])->name('product.index');

Route::get('/product/create', [
    ProductController::class, 'create'
])->name('product.create');

Route::post('/product', [
    ProductController::class, 'store'
])->name('product.store');

Route::get('/product/{product}/edit', [
    ProductController::class, 'edit'
])->name('product.edit');

Route::put('/product/{product}/update', [
    ProductController::class, 'update'
])->name('product.update');

Route::delete('/product/{product}/destroy', [
    ProductController::class, 'destroy'
])->name('product.destroy');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
