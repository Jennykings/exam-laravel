<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;


Route::get('/', function () {
    return view('welcome'); 
})->name('welcome'); 

Route::resource('authors', AuthorController::class);
Route::resource('books', BookController::class);

//Route::get('/books', [BookController::class, 'getBooks']);
//Route::get('/authors', [AuthorController::class, 'getAuthors']); 
//Route::post('/authors', [AuthorController::class, 'store']);
//Route::delete('authors/{author}', [AuthorController::class, 'destroy'])->name('authors.destroy');