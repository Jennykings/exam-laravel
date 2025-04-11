<?php

//use Src\IdentityAndAccess\User\infrastructure\controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Src\IdentityAndAccess\User\Infrastructure\Controllers\AuthController;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('logout', [AuthController::class, 'logout']);
    Route::get('show', [AuthController::class, 'show']);

    // Aquí irán tus rutas protegidas
});
