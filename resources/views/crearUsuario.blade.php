<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Crear Usuario</title>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link href="{{ asset('css/formularioProductos.css') }}" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    @include('layouts.navigation')
    <h2>Crear Usuario</h2>
    <div id="container">
        <form action="/usuarios/crearUsuario" method="post">
            @csrf
            <div class="columna">
                <label for="primer_nombre">Primer Nombre:</label>
                <input type="text" id="primer_nombre" name="primer_nombre" required><br>

                <label for="segundo_apellido">Segundo Apellido:</label>
                <input type="text" id="segundo_apellido" name="segundo_apellido"><br>

                <label for="email">Email:</label>
                <input type="email" id="email" name="usuario" required><br>

                <label for="calle">Calle:</label>
                <input type="text" id="calle" name="calle" required><br>

                <label for="contrasena">Contraseña:</label>
                <input type="password" id="contrasena" name="password" placeholder="8 digitos" required><br>

            </div>

            <div class="columna">

                <label for="primer_apellido">Primer Apellido:</label>
                <input type="text" id="primer_apellido" name="primer_apellido" required><br>

                <label for="tipo">Tipo:</label>
                <select id="tipo" name="tipo" required>
                    <option value="funcionario">Funcionario</option>
                    <option value="chofer">Chofer</option>
                </select>

                <br>

                <label for="ci">CI:</label>
                <input type="text" id="ci" name="ci"><br>

                <label for="numero_de_puerta">Nº Puerta:</label>
                <input type="text" id="numero_de_puerta" name="numero_de_puerta" required><br>

                <label for="confirmacion">Confirmación:</label>
                <input type="password" id="confirmacion" name="password_confirmation" placeholder="8 digitos" required><br>

            </div>

            <input type="submit" value="Enviar">
    </form>

    </div>

    <br>

    @isset($mensaje)
    <span>{{$mensaje}}</span>
    @endisset
</body>
</html>