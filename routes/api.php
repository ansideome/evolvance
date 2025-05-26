<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Authentication
Route::post('auth/login', [AuthController::class, 'login']);
Route::post('auth/register', [AuthController::class, 'register']);
Route::post('auth/verify', [AuthController::class, 'verify']);

// User
Route::middleware('auth:sanctum')->group(
    function() {
        Route::apiResource('users', UserController::class);
        Route::put('users', [UserController::class, 'update']);
        Route::delete('users', [UserController::class, 'destroy']);
    }
);