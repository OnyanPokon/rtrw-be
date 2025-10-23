<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Klasifikasi\klasifikasiController;
use App\Http\Controllers\Polaruang\PolaruangController;
use App\Http\Controllers\Rtrw\RtrwController;
use App\Http\Controllers\Wilayah\WilayahController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::prefix('auth')->controller(AuthController::class)->group(function () {
        Route::get("me", "getUser");
        Route::post("logout", "logout");
    });

    Route::prefix('wilayah')->controller(WilayahController::class)->group(function () {
        Route::get("/", "index");
        Route::post("/", "store");
        Route::get("/{id}", "show");
        Route::put("/{id}", "update");
        Route::delete("/{id}", "destroy");
        Route::delete("/multi-delete", "multiDestroy");
    });

    Route::prefix('polaruang')->controller(PolaruangController::class)->group(function () {
        Route::get("/", "index");
        Route::post("/", "store");
        Route::get("/{id}", "show");
        Route::put("/{id}", "update");
        Route::delete("/{id}", "destroy");
        Route::delete("/multi-delete", "multiDestroy");
    });
    Route::prefix('rtrw')->controller(RtrwController::class)->group(function () {
        Route::get("/", "index");
        Route::post("/", "store");
        Route::get("/{id}", "show");
        Route::put("/{id}", "update");
        Route::delete("/{id}", "destroy");
        Route::delete("/multi-delete", "multiDestroy");
    });

    Route::prefix('klasifikasi')->controller(klasifikasiController::class)->group(function () {
        Route::get("/", "index");
        Route::post("/", "store");
        Route::get("/{id}", "show");
        Route::put("/{id}", "update");
        Route::delete("/{id}", "destroy");
        Route::delete("/multi-delete", "multiDestroy");
    });
});
Route::prefix("auth")->controller(AuthController::class)->group(function () {
    Route::post("login", "login")->name('login');
});
