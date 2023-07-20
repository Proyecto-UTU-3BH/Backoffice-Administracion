<!DOCTYPE html>
<html lang="en">
<head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Listado de Almacenes</title>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link href="{{ asset('css/listarAlmacen.css') }}" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    @include('layouts.navigation')

    <h2>Listado de Almacenes</h2>
    
    <div id="container">
        @foreach($almacenes as $almacen)
        <div class="almacenes"> 
            <p> ID: {{ $almacen->id }} </p> 
            <p> Longitud: {{ $almacen->longitud }} </p> 
            <p> Latitud: {{ $almacen->latitud }} </p>
            <p> Capacidad: {{ $almacen->capacidad }} </p> 
            <p> Teléfono: {{ $almacen->telefono }} </p>
            <br>
            <div class="botones">
                <a href="{{ route('modificarAlmacen', ['idAlmacen' => $almacen->id]) }}"> <button> Modificar </button> </a>
                <form action="{{ route('eliminarAlmacen', ['idAlmacen' => $almacen->id]) }}" method="POST">
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