<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Productos</title>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link href="{{ asset('css/almacenes.css') }}" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    @include('layouts.navigation')
    <h2>Productos</h2>

    <div id="container">
        <div class="operacionesCrud">
            <p>Listar Productos</p>
            <br>
            <a href="{{ route('listarProductos') }}"><button>Listar</button></a>
        </div>
        <div class="operacionesCrud">
            <p>Crear Producto</p>
            <br>
            <a href="{{ route('crearProducto') }}"><button>Crear</button></a>
        </div>
    </div>

</body>
</html>