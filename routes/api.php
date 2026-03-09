<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/categories', [CategoryController::class, 'index']);

Route::get('/categories/{id}/products', [CategoryController::class, 'products']);


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/products', [ProductController::class, 'index']);
    Route::post('/products', [ProductController::class, 'addProduct']);
    Route::put('/products/{id}', [ProductController::class, 'update']);

    Route::post('/categories', [CategoryController::class, 'addCategory']);
    Route::put('/categories/{id}', [CategoryController::class, 'update']);

    Route::post('/logout', [AuthController::class, 'logout']);

});