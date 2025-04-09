<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Autor</title>
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

        input[type="text"], input[type="email"] {
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
            margin-right: 10px;
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
        <h1>Crear Autor</h1>

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

        <!-- Formulario para crear un nuevo autor -->
        <form action="{{ route('authors.store') }}" method="POST">
            @csrf

            <table class="table">
                <tr>
                    <th>Nombre</th>
                    <td><input type="text" name="name" id="name" value="{{ old('name') }}"></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><input type="email" name="email" id="email" value="{{ old('email') }}"></td>
                </tr>
            </table>

            <button type="submit">Guardar Autor</button>

            <a href="{{ route('authors.index') }}" class="back-button">
                <button type="button" class="back-button">Volver</button>
            </a>
        </form>
    </div>

</body>
</html>

