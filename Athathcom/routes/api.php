<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:sanctum'], function () {
    //All secure URL's
    Route::post('/categories/{id}', [CategoryController::class, 'update']);
    Route::apiResource('categories', CategoryController::class);
    Route::post('/products/{id}', [ProductController::class, 'update']);
    Route::get('/search/{id}', [ProductController::class, 'search']);
    Route::apiResource('/products', ProductController::class);
    Route::apiResource('/carts', CartController::class);
    Route::post('/carts/{id}', [CartController::class, 'update']);
    Route::apiResource('/orders', OrderController::class);
    Route::post('/orders/{id}', [OrderController::class, 'update']);
    
});

Route::post("login", [UserController::class, 'index']);
