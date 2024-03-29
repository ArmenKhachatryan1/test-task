<?php

use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\User\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('users')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});

Route::middleware('auth:api')->group(function () {
    Route::prefix('products')->group(function () {
        Route::post('/', [ProductController::class, 'create']);
        Route::get('/{id}', [ProductController::class, 'show']);
        Route::get('/', [ProductController::class, 'showProducts']);
        Route::put('/', [ProductController::class, 'update']);
        Route::delete('/{id}', [ProductController::class, 'delete']);

    });
});

