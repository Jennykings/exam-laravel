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

        // Método para crear un nuevo autor
        public function stores(Request $request)
        {
            try {
                // Validación de los datos
                $request->validate([
                    'name' => 'required|string|max:255',
                    'email' => 'required|email|unique:authors,email',
                ]);
    
                // Crear un nuevo autor
                $author = Author::create($request->all());
    
                // Retornar una respuesta JSON con el autor creado
                return response()->json([
                    'message' => 'Autor creado con éxito.',
                    'data' => $author
                ], 201); // Código de estado 201 (Creado)
            } catch (\Exception $e) {
                // En caso de error, retornar un mensaje de error en JSON
                return response()->json([
                    'message' => 'Hubo un error al crear el autor.',
                    'error' => $e->getMessage()
                ], 500); // Código de estado 500 (Error interno del servidor)
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

    public function destroyed(Author $author)
    {
        try {
            // Eliminar el autor
            $author->delete();

            // Retornar una respuesta JSON de éxito
            return response()->json([
                'message' => 'Autor eliminado con éxito.'
            ], 200); // Código de estado 200 (Éxito)
        } catch (\Exception $e) {
            // En caso de error, retornar un mensaje de error en JSON
            return response()->json([
                'message' => 'Hubo un error al eliminar el autor.',
                'error' => $e->getMessage()
            ], 500); // Código de estado 500 (Error interno del servidor)
        }
    }

    public function updates(Request $request, Author $author)
{
    try {
        // Validar los datos recibidos
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:authors,email,' . $author->id,
        ]);

        // Actualizar los datos del autor
        $author->update($request->all());

        // Devolver la respuesta JSON con los datos del autor actualizado
        return response()->json($author, 200);  // 200 es el código de estado HTTP para éxito
    } catch (\Exception $e) {
        // En caso de error, devolver una respuesta JSON con el error
        return response()->json(['error' => 'Hubo un error al actualizar el autor'], 500);
    }
}

public function shows(Author $author)
{
    try {
        // Devolver una respuesta JSON con el autor
        return response()->json($author, 200);  // 200 es el código de estado HTTP para éxito
    } catch (\Exception $e) {
        // En caso de error, devolver una respuesta JSON con el error
        return response()->json(['error' => 'Hubo un error al obtener el autor'], 500);
    }
}
}
