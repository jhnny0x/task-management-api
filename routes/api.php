<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    ProjectController,
    TagController,
    TaskController,
    AuthController
};

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::apiResource('projects', ProjectController::class);
    Route::apiResource('tags', TagController::class);
    Route::apiResource('tasks', TaskController::class);

    Route::delete('logout', [AuthController::class, 'logout']);
});
