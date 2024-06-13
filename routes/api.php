<?php

use App\Http\Controllers\Api\ApiAuthorController;
use App\Http\Controllers\Api\ApiBookController;
use App\Http\Controllers\Api\Auth\ApiLoginController;
use App\Http\Controllers\Api\Auth\ApiLogoutController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('authors', ApiAuthorController::class);
    Route::apiResource('books', ApiBookController::class);

    Route::prefix('auth')->group(function () {
        Route::get('/user', function (Request $request) {
            return $request->user();
        });
        Route::get('/logout', ApiLogoutController::class);
    });
});

Route::post('auth/login', ApiLoginController::class);