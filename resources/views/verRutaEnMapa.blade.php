<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
    <link href="{{ asset('css/mapa.css') }}" rel="stylesheet">
</head>
<body>
    <div id="map"></div>

    <div id="customAlert" class="custom-alert">
        <span class="close-btn" onclick="closeCustomAlert()">&times;</span>
        Al ingresar las paradas de una ruta deberá realizarlo en el orden que usted crea que sea más optimo. De otra manera
        la ruta no se armará correctamente. 
    </div>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
    <script src="{{ asset('js/mapa.js') }}"></script>

</body>
</html>