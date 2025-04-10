<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // Método para listar posts con paginación, filtrado y ordenamiento
    public function index(Request $request)
    {
        // Empezamos a construir la consulta
        $query = Post::with('user');  // Cargamos la relación user para cada post

        // Filtro por user_id
        if ($request->has('user_id')) {
            $query->where('user_id', $request->user_id);
        }

        // Filtro: solo los míos (si es que el usuario está autenticado)
        if ($request->boolean('my_posts')) {
            $query->where('user_id', $request->user()->id);
        }

        // Ordenar los resultados por fecha de creación
        if ($request->has('order')) {
            $query->orderBy('created_at', $request->order);
        }

        // Paginación
        return response()->json($query->paginate(10));  // Devuelve la respuesta paginada
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    // Método para crear un nuevo post
    public function store(Request $request)
    {
        // Validamos los datos del post
        $data = $request->validate([
            'title' => 'required|string|max:255',  // Título obligatorio
            'content' => 'required|string',  // Contenido obligatorio
        ]);

        // Creamos el post asociado al usuario autenticado
        $post = $request->user()->posts()->create($data);

        // Respondemos con el post recién creado
        return response()->json($post, 201);
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
{
    try {
        // Buscar el post por ID y cargar relación con el usuario
        $post = Post::with('user')->findOrFail($id);

    } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        return response()->json([
            'message' => 'Post no encontrado.'
        ], 404);
    } catch (\Exception $e) {
        // Para cualquier otro tipo de error
        return response()->json([
            'message' => 'Error al obtener el post.',
            'error' => $e->getMessage()
        ], 500);
    }
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    // Método para actualizar un post existente
    public function update(Request $request, Post $post)
{
    // Verificamos que el usuario autenticado sea el mismo que creó el post
    if ($request->user()->id !== $post->user_id) {
        return response()->json(['message' => 'No autorizado'], 403);
    }

    // Validamos los datos que se quieren actualizar
    $data = $request->validate([
        'title' => 'string|max:255',
        'content' => 'string',
    ]);

    // Actualizamos el post con los nuevos datos
    $post->update($data);

    // Respondemos con el post actualizado
    return response()->json($post);
}
    /**
     * Remove the specified resource from storage.
     */
   // Método para eliminar un post
   public function destroy(Request $request, Post $post)
   {
       // Comprobamos si el usuario autenticado es el propietario del post
       if ($request->user()->id !== $post->user_id) {
           return response()->json(['message' => 'No autorizado'], 403);
       }

       // Eliminamos el post
       $post->delete();

       // Respondemos con un mensaje de confirmación
       return response()->json(['message' => 'Post eliminado']);
   }
}
