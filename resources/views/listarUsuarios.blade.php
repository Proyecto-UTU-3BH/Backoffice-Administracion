<!DOCTYPE html>
<html lang="en">
<head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Listado de Usuarios</title>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link href="{{ asset('css/listarAlmacen.css') }}" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    @include('layouts.navigation')

    <h2>Listado de Usuarios</h2>
    
    <div id="container">
        @foreach($usuarios as $usuario)
        <div class="usuarios"> 
            <p> ID: {{ $usuario->id }} </p> 
            <p> Nombre: {{ $usuario->name }} </p> 
            <p> Email: {{ $usuario->email }} </p>
            <br>
            <div class="botones">
                <a href="{{ route('modificarUsuario', ['idUsuario' => $usuario->id]) }}"> <button> Modificar </button> </a>
                <form action="{{ route('eliminarUsuario', ['idUsuario' => $usuario->id]) }}" method="POST">
                    @csrf
                    @method('DELETE') 
                    <button type="submit"> Eliminar </button> 
                </form>
            </div>  
         </div>
        @endforeach 
    </div>
    
    
</body>
</html>