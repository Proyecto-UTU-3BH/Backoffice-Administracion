<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Modificar Usuario</title>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link href="{{ asset('css/formularioProductos.css') }}" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    @include('layouts.navigation')
    <h2>Modificar Usuario</h2>
    <div id="container">
        <form action="/usuarios/modificarUsuario/{{$usuario->id}}" method="post">
            @csrf
            <div class="columna">
                <label for="primer_nombre">Primer Nombre:</label>
                <input type="text" id="primer_nombre" name="primer_nombre" value="{{$usuario->primer_nombre}}" required><br>

                <label for="segundo_apellido">Segundo Apellido:</label>
                <input type="text" id="segundo_apellido" name="segundo_apellido" value="{{$usuario->segundo_apellido}}"><br>

                <label for="email">Email:</label>
                <input type="email" id="email" name="usuario" value="{{$usuario->usuario}}" required><br>

                <label for="calle">Calle:</label>
                <input type="text" id="calle" name="calle" value="{{$usuario->calle}}" required><br>

                <label for="contrasena">Contraseña:</label>
                <input type="password" id="contrasena" name="password" placeholder="8 digitos" value="{{$usuario->password}}"required><br>

            </div>

            <div class="columna">

                <label for="primer_apellido">Primer Apellido:</label>
                <input type="text" id="primer_apellido" name="primer_apellido" value="{{$usuario->primer_apellido}}" required><br>

                <label for="tipo">Tipo:</label>
                <select id="tipo" name="tipo" required>
                    <option value="funcionario" @if($usuario->tipo == 'funcionario') selected @endif>Funcionario</option>
                    <option value="chofer" @if($usuario->tipo == 'chofer') selected @endif>Chofer</option>
                </select>

                <br>

                <label for="ci">CI:</label>
                <input type="text" id="ci" name="ci" value="{{$usuario->ci}}" required><br>

                <label for="numero_de_puerta">Nº Puerta:</label>
                <input type="text" id="numero_de_puerta" name="numero_de_puerta" value="{{$usuario->numero_de_puerta}}" required><br>

            </div>

            <input type="submit" value="Enviar">
    </form>

    </div>

    <br>

</body>
</html>