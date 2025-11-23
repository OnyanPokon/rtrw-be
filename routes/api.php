<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DasarHukum\DasarHukumController;
use App\Http\Controllers\IndikasiProgram\IndikasiProgramController;
use App\Http\Controllers\KetentuanKhusus\KetentuanKhususController;
use App\Http\Controllers\Pkkprl\PkkprlController;
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
Route::get('/ketentuan_khusus/{id}/geojson', [KetentuanKhususController::class, 'showGeoJson']);
Route::get('/pkkprl/{id}/geojson', [PkkprlController::class, 'showGeoJson']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::prefix('auth')->controller(AuthController::class)->group(function () {
        Route::get("me", "getUser");
        Route::post("logout", "logout");
    });

    Route::prefix('wilayah')->controller(WilayahController::class)->group(function () {
        Route::get("/", "index");
        Route::post("/", "store");
        Route::delete("/multi-delete", "multiDestroy");
        Route::get("/{id}", "show");
        Route::put("/{id}", "update");
        Route::delete("/{id}", "destroy");
    });

    Route::prefix('polaruang')->controller(PolaruangController::class)->group(function () {
        Route::get("/", "index");
        Route::post("/", "store");
        Route::delete("/multi-delete", "multiDestroy");
        Route::get("/{id}", "show");
        Route::put("/{id}", "update");
        Route::delete("/{id}", "destroy");
    });

    Route::prefix('ketentuan_khusus')->controller(KetentuanKhususController::class)->group(function () {
        Route::get("/", "index");
        Route::post("/", "store");
        Route::delete("/multi-delete", "multiDestroy");
        Route::get("/{id}", "show");
        Route::put("/{id}", "update");
        Route::delete("/{id}", "destroy");
    });

    Route::prefix('indikasi_program')->controller(IndikasiProgramController::class)->group(function () {
        Route::get("/", "index");
        Route::post("/", "store");
        Route::delete("/multi-delete", "multiDestroy");
        Route::get("/{id}", "show");
        Route::put("/{id}", "update");
        Route::delete("/{id}", "destroy");
    });

    Route::prefix('pkkprl')->controller(PkkprlController::class)->group(function () {
        Route::get("/", "index");
        Route::post("/", "store");
        Route::delete("/multi-delete", "multiDestroy");
        Route::get("/{id}", "show");
        Route::put("/{id}", "update");
        Route::delete("/{id}", "destroy");
    });

    Route::prefix('struktur_ruang')->controller(StrukturRuangController::class)->group(function () {
        Route::get("/", "index");
        Route::post("/", "store");
        Route::delete("/multi-delete", "multiDestroy");
        Route::get("/{id}", "show");
        Route::put("/{id}", "update");
        Route::delete("/{id}", "destroy");
    });

    Route::prefix('rtrw')->controller(RtrwController::class)->group(function () {
        Route::post("/", "store");
        Route::delete("/multi-delete", "multiDestroy");
        Route::put("/{id}", "update");
        Route::delete("/{id}", "destroy");
    });

    Route::prefix('periode')->controller(PeriodeController::class)->group(function () {
        Route::get("/", "index");
        Route::post("/", "store");
        Route::delete("/multi-delete", "multiDestroy");
        Route::get("/{id}", "show");
        Route::put("/{id}", "update");
        Route::delete("/{id}", "destroy");
    });

    Route::prefix('dasar_hukum')->controller(DasarHukumController::class)->group(function () {
        Route::get("/", "index");
        Route::post("/", "store");
        Route::delete("/multi-delete", "multiDestroy");
        Route::get("/{id}", "show");
        Route::put("/{id}", "update");
        Route::delete("/{id}", "destroy");
    });

    Route::prefix('klasifikasi')->controller(klasifikasiController::class)->group(function () {
        Route::get("/", "index");
        Route::post("/", "store");
        Route::delete("/multi-delete", "multiDestroy");
        Route::get("/{id}", "show");
        Route::put("/{id}", "update");
        Route::delete("/{id}", "destroy");
    });
});
Route::prefix("auth")->controller(AuthController::class)->group(function () {
    Route::post("login", "login")->name('login');
});
