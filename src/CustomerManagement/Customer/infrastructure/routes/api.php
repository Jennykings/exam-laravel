<?php

use Illuminate\Support\Facades\Route;
use Src\CustomerManagement\Customer\infrastructure\controllers\CustomerController;

//Route::middleware('auth:sanctum')->prefix('customers')->group(function () {
//    Route::post('/', [CustomerController::class, 'store']);
//    Route::get('/', [CustomerController::class, 'index']);
 //   Route::put('/{id}', [CustomerController::class, 'update']);
 //   Route::delete('/{id}', [CustomerController::class, 'destroy']);
//});

Route::middleware('auth:sanctum')->group(function () {
    //Route::get('logout', [AuthController::class, 'logout']);
    //Route::get('show', [AuthController::class, 'show']);

        Route::post('store', [CustomerController::class, 'store']);
    Route::get('index', [CustomerController::class, 'index']);
    Route::put('/{id}', [CustomerController::class, 'update']);
    Route::delete('/{id}', [CustomerController::class, 'destroy']);
});

