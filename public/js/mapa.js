var urlParams = new URLSearchParams(window.location.search);
var coordenadasJSON = urlParams.get('coordenadas');
var coordenadas = JSON.parse(coordenadasJSON);

var map = L.map('map').setView([-33.431118, -56.013162], 8);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '© OpenStreetMap'
}).addTo(map);

map.locate({ setView: true, maxZoom: 12 });

function onLocationFound(e) {
    
    var ubicacionUsuario = e.latlng;
    coordenadas.unshift({ latitud: ubicacionUsuario.lat, longitud: ubicacionUsuario.lng, destino: "Ubicación Actual" });

    crearDestinosEnMapa(coordenadas);
}

map.on('locationfound', onLocationFound);

function onLocationError(e) {
    alert(e.message);
}

map.on('locationerror', onLocationError);

function calcularRuta(destinos) {
    if (destinos.length < 2) {
        return;
    }

    L.Routing.control({
        waypoints: destinos,
        routeWhileDragging: true,
        createMarker: false,
        show: true,  
    }).addTo(map);
}

function crearDestinosEnMapa(coordenadas) {
    var destinos = [];  // Inicializa una variable para almacenar los destinos

    coordenadas.forEach(function(coordenada) {
        var latitud = parseFloat(coordenada.latitud);
        var longitud = parseFloat(coordenada.longitud);

        var destino = L.latLng(latitud, longitud);

        destinos.push(destino);  // Agrega el destino a la lista de destinos
        var nombreDestino = coordenada.destino;

        // Crea un marcador en el mapa para este destino
        L.marker(destino).addTo(map)
            .bindPopup("Destino: " + nombreDestino + "<br>Latitud: " + latitud + "<br>Longitud: " + longitud)
            .openPopup();
    });

    // Llama a la función para calcular la ruta óptima con los destinos
    calcularRuta(destinos);
}
