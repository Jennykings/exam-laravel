<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;


Route::get('/', function () {
    return view('welcome'); 
})->name('welcome'); 

//Route::resource('authors', AuthorController::class);
//Route::resource('books', BookController::class);

Route::get('/books', [BookController::class, 'getBooks']);
Route::get('/authors', [AuthorController::class, 'getAuthors']); 
Route::post('/authors', [AuthorController::class, 'stores']);
//Route::delete('authors/{author}', [AuthorController::class, 'destroy'])->name('authors.destroy');
Route::delete('/authors/{author}', [AuthorController::class, 'destroyed']);
// Ruta para obtener los detalles de un autor por ID, con respuesta JSON
Route::get('/authors/{author}', [AuthorController::class, 'shows'])->name('authors.show');
// Ruta para actualizar el autor (PUT), con respuesta en formato JSON
Route::put('/authors/{author}', [AuthorController::class, 'updates'])->name('authors.update');