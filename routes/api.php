<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DasarHukum\DasarHukumController;
use App\Http\Controllers\Klasifikasi\klasifikasiController;
use App\Http\Controllers\Periode\PeriodeController;
use App\Http\Controllers\Polaruang\PolaruangController;
use App\Http\Controllers\Rtrw\RtrwController;
use App\Http\Controllers\Wilayah\WilayahController;
use App\Http\Controllers\StrukturRuang\StrukturRuangController;
use Illuminate\Support\Facades\Route;

Route::prefix('rtrw')->controller(RtrwController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/{id}', 'show');
});

Route::get('/rtrw/{id}/klasifikasi', [RtrwController::class, 'klasifikasiByRTRW']);

Route::get('/polaruang/{id}/geojson', [PolaruangController::class, 'showGeoJson']);
Route::get('/struktur_ruang/{id}/geojson', [StrukturRuangController::class, 'showGeoJson']);

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

    Route::prefix('struktur_ruang')->controller(StrukturRuangController::class)->group(function () {
        Route::get("/", "index");
        Route::post("/", "store");
        Route::get("/{id}", "show");
        Route::put("/{id}", "update");
        Route::delete("/{id}", "destroy");
        Route::delete("/multi-delete", "multiDestroy");
    });

    Route::prefix('rtrw')->controller(RtrwController::class)->group(function () {
        Route::post("/", "store");
        Route::put("/{id}", "update");
        Route::delete("/{id}", "destroy");
        Route::delete("/multi-delete", "multiDestroy");
    });

    Route::prefix('periode')->controller(PeriodeController::class)->group(function () {
        Route::get("/", "index");
        Route::post("/", "store");
        Route::get("/{id}", "show");
        Route::put("/{id}", "update");
        Route::delete("/{id}", "destroy");
        Route::delete("/multi-delete", "multiDestroy");
    });

    Route::prefix('dasar_hukum')->controller(DasarHukumController::class)->group(function () {
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
