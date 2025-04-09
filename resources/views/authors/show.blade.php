<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Autor</title>
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
            width: 60%;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .table {
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
            padding: 8px 15px;
            margin: 0 10px;
            font-size: 14px;
            text-decoration: none;
            color: white;
            border-radius: 4px;
            border: none;
            transition: background-color 0.3s;
        }

        .action-buttons a.edit {
            background-color: #FFEB3B; 
            color: #333; 
        }

        .action-buttons a.edit:hover {
            background-color: #fdd835; 
        }

        .action-buttons form button {
            background-color: #f44336;
            padding: 8px 15px;
        }

        .action-buttons form button:hover {
            background-color: #da190b;
        }

        /* Estilo para el botón "Volver" */
        .back-button {
            background-color: #2196F3;
            padding: 8px 15px;
            text-decoration: none;
            border-radius: 4px;
            color: white;
            transition: background-color 0.3s;
        }

        .back-button:hover {
            background-color: #1e88e5;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Detalles del Autor</h1>

        <!-- Tabla de detalles del autor -->
        <table class="table">
            <tr>
                <th>Nombre</th>
                <td>{{ $author->name }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $author->email }}</td>
            </tr>
        </table>

        <!-- Botones de acción -->
        <div class="action-buttons">
            <!-- Botón Editar -->
            <a href="{{ route('authors.edit', $author->id) }}" class="edit">Editar</a>

            <!-- Botón Eliminar -->
            <form action="{{ route('authors.destroy', $author->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Eliminar</button>
            </form>

            <!-- Botón Volver -->
            <a href="{{ route('authors.index') }}" class="back-button">Volver</a>
        </div>

    </div>

</body>
</html>

