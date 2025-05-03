<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Api\AuthController;

Route::prefix('v1')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/posts', [PostController::class, 'apiIndex']);
        Route::get('/posts/{id}', [PostController::class, 'apiShow']);
        Route::post('/posts', [PostController::class, 'apiStore']);
        Route::put('/posts/{id}', [PostController::class, 'apiUpdate']);
        Route::delete('/posts/{id}', [PostController::class, 'apiDestroy']);
    });
});