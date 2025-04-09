<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();
        return view('authors.index', compact('authors'));
    }

    public function create()
    {
        return view('authors.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:authors,email',
            ]);

            Author::create($request->all());
            return redirect()->route('authors.index');
        } catch (\Exception $e) {
            return response()->view('errors.500', [], 500);
        }
    }

    public function show(Author $author)
    {
        return view('authors.show', compact('author'));
    }

    public function edit(Author $author)
    {
        return view('authors.edit', compact('author'));
    }

    public function update(Request $request, Author $author)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:authors,email,' . $author->id,
            ]);

            $author->update($request->all());
            return redirect()->route('authors.index');
        } catch (\Exception $e) {
            return response()->view('errors.500', [], 500);
        }
    }

    public function destroy(Author $author)
    {
        try {
            $author->delete();
            return redirect()->route('authors.index');
        } catch (\Exception $e) {
            return response()->view('errors.500', [], 500);
        }
    }

    public function getAuthors()
    {
        // Recupera todos los autores
        $authors = Author::all();
        
        // Devuelve los autores en formato JSON
        return response()->json($authors);
    }
}
