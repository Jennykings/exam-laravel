<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido a la Biblioteca</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding-top: 50px;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            margin: 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            font-size: 16px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <h1>Bienvenido a la Biblioteca</h1>

    <p>Elige una de las opciones para ver los autores o libros:</p>

    <a href="{{ route('authors.index') }}" class="button">Ver Autores</a>
    <a href="{{ route('books.index') }}" class="button">Ver Libros</a>

</body>
</html>
