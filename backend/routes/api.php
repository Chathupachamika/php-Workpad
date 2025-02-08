<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemsController;

// API Routes
Route::prefix('v1')->group(function () {
    Route::post('/items', [ItemsController::class, 'postItem']);
    Route::get('/items', [ItemsController::class, 'getItems']);
    Route::get('/items/{id}', [ItemsController::class, 'getItem']);
    Route::put('/items/{id}', [ItemsController::class, 'updateItem']);
    Route::delete('/items/{id}', [ItemsController::class, 'deleteItem']);
});
