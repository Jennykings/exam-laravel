<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Libro</title>
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
            width: 30%;
        }

        td {
            font-size: 14px;
            width: 70%;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            font-size: 14px;
        }

        input[type="text"], input[type="number"], textarea, select {
            width: 100%;
            padding: 8px;
            margin: 5px 0 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }

        button {
            padding: 8px 15px;
            font-size: 14px;
            text-decoration: none;
            color: white;
            border-radius: 4px;
            background-color: #4CAF50;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #45a049;
        }

        .error-messages {
            color: red;
            margin-bottom: 20px;
        }

        .error-messages ul {
            list-style: none;
            padding: 0;
        }

        .error-messages li {
            margin-bottom: 5px;
        }

        /* Estilo para el botón "Volver" */
        .back-button {
            padding: 8px 15px;
            font-size: 14px;
            text-decoration: none;
            color: white;
            background-color: #2196F3;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .back-button:hover {
            background-color: #1e88e5;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
            justify-content: flex-start;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Actualizar Libro</h1>

        <!-- Mostrar mensajes de error -->
        @if ($errors->any())
            <div class="error-messages">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulario para actualizar un libro -->
        <form action="{{ route('books.update', $book->id) }}" method="POST">
            @csrf
            @method('PUT')

            <table class="table">
                <tr>
                    <th>Título</th>
                    <td><input type="text" name="title" id="title" value="{{ old('title', $book->title) }}"></td>
                </tr>
                <tr>
                    <th>Descripción</th>
                    <td><textarea name="description" id="description">{{ old('description', $book->description) }}</textarea></td>
                </tr>
                <tr>
                    <th>Precio</th>
                    <td><input type="number" name="price" id="price" value="{{ old('price', $book->price) }}"></td>
                </tr>
                <tr>
                    <th>Autor</th>
                    <td>
                        <select name="author_id" id="author_id">
                            @foreach ($authors as $author)
                                <option value="{{ $author->id }}" {{ old('author_id', $book->author_id) == $author->id ? 'selected' : '' }}>
                                    {{ $author->name }}
                                </option>
                            @endforeach
                        </select>
                    </td>
                </tr>
            </table>

            <div class="action-buttons">
                <button type="submit">Actualizar Libro</button>

                <!-- Botón Volver -->
                <a href="{{ route('books.index') }}" class="back-button">Volver</a>
            </div>
        </form>
    </div>

</body>
</html>
