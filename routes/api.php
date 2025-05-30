<?php

use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BootcampController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\WeekController;
use Illuminate\Support\Facades\Route;

// Authentication
Route::post('auth/login', [AuthController::class, 'login']);
Route::post('auth/register', [AuthController::class, 'register']);
Route::post('auth/verify', [AuthController::class, 'verify']);

Route::apiResource('bootcamps', BootcampController::class);

Route::patch('/weeks/{id}/schedule', [WeekController::class, 'updateSchedule']);

Route::apiResource('materials', MaterialController::class)->only(['store', 'update']);

Route::apiResource('assignments', AssignmentController::class)->only(['store', 'update']);

Route::post('/submissions', [SubmissionController::class, 'store']);
Route::get('/submissions/{assignment_id}', [SubmissionController::class, 'index']);
