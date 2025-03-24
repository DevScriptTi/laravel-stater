<?php

use App\Http\Controllers\Api\Auth\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(["redirectIfAuth:api"])->prefix('auth')->group(function () {
    Route::post('login',[AuthController::class, 'login']);
    Route::post('register',[AuthController::class, 'register']);
    Route::post('resetToken',[AuthController::class, 'sendResetToken']);
    Route::post('resetPassword',[AuthController::class, 'resetPassword']);
});

Route::middleware(['auth:sanctum'])->prefix('auth')->group(function () {
    Route::post('logout',[AuthController::class, 'logout']);
});
