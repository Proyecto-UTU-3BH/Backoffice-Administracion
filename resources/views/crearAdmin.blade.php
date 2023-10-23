<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Crear Admin</title>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link href="{{ asset('css/crearAlmacen.css') }}" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    @include('layouts.navigation')
    <h2>Crear Admin</h2>
    <div id="container">
        <form action="/admins/crearAdmin" method="post">
            @csrf

            <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" id="name" name="name" required>
                @if($errors->has('name'))
                    <span class="error">{{ $errors->first('name') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                @if($errors->has('email'))
                    <span class="error">{{ $errors->first('email') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="contrasena">Contraseña:</label>
                <input type="password" id="contrasena" name="password" placeholder="8 dígitos" required>
                @if($errors->has('password'))
                    <span class="error">{{ $errors->first('password') }}</span>
                @endif
            </div>

            <input type="submit" value="Crear">
        </form>
    </div>

    <br>

    @isset($mensaje)
    <span>{{$mensaje}}</span>
    @endisset
</body>
</html>