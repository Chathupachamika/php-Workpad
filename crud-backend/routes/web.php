<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisteredUserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/api/users', [RegisteredUserController::class, 'index']);

Route::apiResource('/posts', PostController::class);
