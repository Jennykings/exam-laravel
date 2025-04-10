<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// Rutas públicas (ej. registro y login)
//Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register']);
//Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
// Ruta protegida
//Route::middleware('auth:sanctum')->post('logout', [AuthController::class, 'logout']);
//Route::middleware('auth:sanctum')->put('/posts/{post}', [PostController::class, 'update']);

// Rutas protegidas con Sanctum
Route::middleware('auth:sanctum')->group(function () {   
    Route::get('posts', [PostController::class, 'index']);       // Listar con filtros, orden, paginación
    Route::post('posts', [PostController::class, 'store']);       // Crear
    Route::get('posts/{post}', [PostController::class, 'show']);    // Ver detalle
    Route::put('posts/{post}', [PostController::class, 'update']); // Actualizar
    Route::delete('posts/{post}', [PostController::class, 'destroy']); // Eliminar
    Route::get('logout', [AuthController::class, 'logout']);
});
