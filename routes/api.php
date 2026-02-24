<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\KantinMenuController;
use App\Http\Controllers\Api\KantinGiziController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/
Route::get('/ping', function() {
    return response()->json([
        'status' => 'success',
        'message' => 'Pong! API is working',
        'timestamp' => now()->format('Y-m-d H:i:s'),
        'data' => [
            'routes_available' => [
                'menus' => '/api/v1/kantin-menus'
      
            ]
        ]
    ]);
});


Route::prefix('v1')->group(function () {
    
    // Kantin Menu Routes
    Route::prefix('kantin-menus')->group(function () {
        // Specific routes first
        Route::get('/best-seller', [KantinMenuController::class, 'bestSeller']);
        Route::get('/search', [KantinMenuController::class, 'search']);
        Route::get('/kategori/{kategori}', [KantinMenuController::class, 'byKategori']);
        
        // Generic routes last
        Route::get('/', [KantinMenuController::class, 'index']);
        Route::post('/', [KantinMenuController::class, 'store']);
        Route::get('/{id}', [KantinMenuController::class, 'show']);
        Route::put('/{id}', [KantinMenuController::class, 'update']);
        Route::delete('/{id}', [KantinMenuController::class, 'destroy']);
    });



});