<?php

use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BootcampController;
use App\Http\Controllers\BootcampPurchaseController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\StorageController;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\WeekController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::post('auth/login', [AuthController::class, 'login']);
Route::post('auth/register', [AuthController::class, 'register']);
Route::post('auth/verify', [AuthController::class, 'verify']);

Route::middleware(['auth:sanctum', 'role:admin'])->group(function () {
    Route::apiResource('bootcamps', BootcampController::class)->except(['index', 'show']);
    Route::apiResource('materials', MaterialController::class);
    Route::apiResource('assignments', AssignmentController::class);
    Route::patch('/weeks/{id}/schedule', [WeekController::class, 'updateSchedule']);
    Route::get('/submissions/{assignment_id}', [SubmissionController::class, 'index']);
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/submissions', [SubmissionController::class, 'store']);
    Route::post('/bootcamps/purchase/{id}', [BootcampPurchaseController::class, 'purchase']);
    Route::get('/bootcamps/my', [BootcampPurchaseController::class, 'myBootcamps']);
    Route::apiResource('bootcamps', BootcampController::class)->only(['index', 'show']);
});

Route::get('/storage/{path}', [StorageController::class, 'show'])
    ->where('path', '.*');

// User
Route::middleware('auth:sanctum')->group(
    function() {
        Route::apiResource('users', UserController::class);
        Route::put('users', [UserController::class, 'update']);
        Route::delete('users', [UserController::class, 'destroy']);
    }
);