<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::prefix('auth')->controller(AuthController::class)->group(function () {
        Route::get("me", "getUser");
        Route::post("logout", "logout");
    });
});
Route::prefix("auth")->controller(AuthController::class)->group(function () {
    Route::post("login", "login")->name('login');
});
