<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\LandingController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// Public routes
Route::prefix('auth')->group(function () {
    Route::post('/check-nis', [AuthController::class, 'checkNis']);
    Route::post('/step-orangtua', [AuthController::class, 'stepOrangTua']);
    Route::post('/step-ttl', [AuthController::class, 'stepTTL']);
    Route::post('/step-pin', [AuthController::class, 'stepPin']);
    Route::post('/send-otp', [AuthController::class, 'sendOtp']);
    Route::post('/verify-otp', [AuthController::class, 'verifyOtp']);
    Route::post('/login', [AuthController::class, 'loginWithPin']);
});

// Protected routes (require authentication)
Route::middleware('auth:sanctum')->group(function () {
    
    // Auth routes
    Route::prefix('auth')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::get('/me', [AuthController::class, 'me']);
        Route::post('/change-pin', [AuthController::class, 'changePin']);
    });

    // Landing page for siswa/guru
    Route::prefix('landing')->group(function () {
        Route::get('/', [LandingController::class, 'index']);
        Route::get('/profile', [LandingController::class, 'profile']);
        Route::put('/profile', [LandingController::class, 'updateProfile']);
        Route::get('/balance', [LandingController::class, 'checkBalance']);
        Route::get('/transactions', [LandingController::class, 'getTransactions']);
        Route::post('/change-pin', [LandingController::class, 'changePin']);
    });

    // Admin routes
    Route::prefix('admin')->middleware('admin')->group(function () {
        
        // General admin dashboard
        Route::get('/dashboard', [AdminController::class, 'dashboardAdmin']);
        
        // RPL Admin routes
        Route::prefix('rpl')->middleware('admin:rpl')->group(function () {
            Route::get('/dashboard', [AdminController::class, 'dashboardRpl']);
            Route::get('/siswa', [AdminController::class, 'getSiswaByJurusan']);
            Route::put('/siswa/{id}', [AdminController::class, 'updateSiswa']);
        });
        
        // Kuliner Admin routes
        Route::prefix('kuliner')->middleware('admin:kuliner')->group(function () {
            Route::get('/dashboard', [AdminController::class, 'dashboardKuliner']);
            Route::get('/siswa', [AdminController::class, 'getSiswaByJurusan']);
            Route::put('/siswa/{id}', [AdminController::class, 'updateSiswa']);
        });
        
        // Farmasi Admin routes
        Route::prefix('farmasi')->middleware('admin:farmasi')->group(function () {
            Route::get('/dashboard', [AdminController::class, 'dashboardFarmasi']);
            Route::get('/siswa', [AdminController::class, 'getSiswaByJurusan']);
            Route::put('/siswa/{id}', [AdminController::class, 'updateSiswa']);
        });
        
        // Akuntansi Admin routes
        Route::prefix('akuntansi')->middleware('admin:akuntansi')->group(function () {
            Route::get('/dashboard', [AdminController::class, 'dashboardAkuntansi']);
            Route::get('/siswa', [AdminController::class, 'getSiswaByJurusan']);
            Route::put('/siswa/{id}', [AdminController::class, 'updateSiswa']);
        });

        // Cross-jurusan routes (superadmin only)
        Route::middleware('admin:superadmin')->group(function () {
            Route::get('/all-siswa', [AdminController::class, 'getAllSiswa']);
            Route::get('/all-admin', [AdminController::class, 'getAllAdmin']);
            Route::post('/create-admin', [AdminController::class, 'createAdmin']);
            Route::delete('/admin/{id}', [AdminController::class, 'deleteAdmin']);
        });
    });
});

// SuperAdmin routes
Route::prefix('superadmin')->middleware(['auth:sanctum', 'admin:superadmin'])->group(function () {
    Route::get('/siswa', [SuperAdminController::class, 'getAllSiswa']);
    Route::get('/admin', [SuperAdminController::class, 'getAllAdmin']);
    Route::post('/admin', [SuperAdminController::class, 'createAdmin']);
    Route::delete('/admin/{id}', [SuperAdminController::class, 'deleteAdmin']);
});
