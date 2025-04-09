<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Autores</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin: 30px 0;
            color: #333;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            margin: 20px 0;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            font-size: 16px;
            border-radius: 5px;
            transition: background-color 0.3s;
            text-align: center;
        }

        .button:hover {
            background-color: #45a049;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        td {
            font-size: 14px;
        }

        .action-buttons a, .action-buttons button {
            padding: 5px 10px;
            margin: 0 5px;
            font-size: 14px;
            text-decoration: none;
            color: white;
            border-radius: 4px;
            border: none;
            transition: background-color 0.3s;
        }

        .action-buttons a.view-details {
            background-color: #2196F3; 
            color: white;
        }

        .action-buttons a.view-details:hover {
            background-color: #0b7dda; 
        }

        .action-buttons a.edit {
            background-color: #FFEB3B; 
            color: #333; 
        }

        .action-buttons a.edit:hover {
            background-color: #fdd835; 
        }

        .action-buttons a:hover, .action-buttons button:hover {
            background-color: #0b7dda;
        }

        .action-buttons form button {
            background-color: #f44336;
        }

        .action-buttons form button:hover {
            background-color: #da190b;
        }

        /* Estilo para el botón de volver */
        .back-button {
            background-color: #2196F3;
            color: white;
            text-decoration: none;
            font-size: 16px;
            padding: 10px 20px;
            border-radius: 5px;
            display: inline-block;
            margin: 10px 0;
            text-align: center;
            transition: background-color 0.3s;
        }

        .back-button:hover {
            background-color: #1e88e5;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Lista de Autores</h1>

        <!-- Botón para crear un nuevo autor -->
        <a href="{{ route('authors.create') }}" class="button">Crear Nuevo Autor</a>

        <!-- Botón para volver -->
        <a href="{{ route('welcome') }}" class="back-button">Volver</a>

        <!-- Tabla para mostrar los autores -->
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($authors as $author)
                    <tr>
                        <td>{{ $author->name }}</td>
                        <td>{{ $author->email }}</td>
                        <td class="action-buttons">
                            <!-- Botón Ver detalles con clase específica para color azul -->
                            <a href="{{ route('authors.show', $author->id) }}" class="view-details">Ver detalles</a>
                            <!-- Botón Editar con clase específica para color amarillo -->
                            <a href="{{ route('authors.edit', $author->id) }}" class="edit">Editar</a>
                            <form action="{{ route('authors.destroy', $author->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>
