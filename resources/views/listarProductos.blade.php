<!DOCTYPE html>
<html lang="en">
<head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Listado de Productos</title>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link href="{{ asset('css/listarAlmacen.css') }}" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    @include('layouts.navigation')

    <h2>Listado de Productos</h2>
    
    <div id="container">
        @foreach($productos as $producto)
        <div class="productos"> 
            <p> ID: {{ $producto->id }} </p> 
            <p> Destino: {{ $producto->destino }} </p> 
            <p> Estado: {{ $producto->estado }} </p>
            <p> Tipo: {{ $producto->tipo }} </p> 
            <p> Peso: {{ $producto->peso }} </p>
            <br>
            <div class="botones">
                <a href="#"> <button> Modificar </button> </a>
                <form action="{{ route('eliminarProducto', ['idProducto' => $producto->id]) }}" method="POST">
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