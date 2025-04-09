<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;

class BookController extends Controller
{
    
    public function index()
    {
        $books = Book::with('author')->get();  // Obtener libros con su autor
        return view('books.index', compact('books'));
    }

    public function create()
    {
        $authors = Author::all();  // Obtener todos los autores
        return view('books.create', compact('authors'));
    }

    public function store(Request $request)
    {
        try {
            // Validación de los datos
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'price' => 'required|numeric|min:0',
                'author_id' => 'required|exists:authors,id',
            ]);

            // Crear un libro
            Book::create($request->all());

            // Redirigir a la lista de libros
            return redirect()->route('books.index');
        } catch (\Exception $e) {
            // Si ocurre una excepción, mostrar un error 500
            return response()->view('errors.500', [], 500);
        }
    }

    public function show(Book $book)
    {
        $book->load('author');  // Cargar autor relacionado
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        $authors = Author::all();
        return view('books.edit', compact('book', 'authors'));
    }

    public function update(Request $request, Book $book)
    {
        try {
            // Validación de los datos
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'price' => 'required|numeric|min:0',
                'author_id' => 'required|exists:authors,id',
            ]);

            // Actualizar el libro
            $book->update($request->all());

            // Redirigir a la lista de libros
            return redirect()->route('books.index');
        } catch (\Exception $e) {
            // Si ocurre una excepción, mostrar un error 500
            return response()->view('errors.500', [], 500);
        }
    }

    public function destroy(Book $book)
    {
        try {
            // Eliminar el libro
            $book->delete();

            // Redirigir a la lista de libros
            return redirect()->route('books.index');
        } catch (\Exception $e) {
            // Si ocurre una excepción, mostrar un error 500
            return response()->view('errors.500', [], 500);
        }
    }

    public function getBooks()
    {
        // Recupera todos los libros
        $books = Book::all();
        
        // Devuelve los libros en formato JSON
        return response()->json($books);
    }

}
