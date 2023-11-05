var map;
var userLocation = null;
var coordenadas;

function onLocationFound(e) {
        
    var ubicacionUsuario = e.latlng;
    coordenadas.unshift({ latitud: ubicacionUsuario.lat, longitud: ubicacionUsuario.lng, destino: "Ubicación Actual" });

    crearDestinosEnMapa(coordenadas);
}

function onLocationError(e) {
    alert(e.message);
}

function crearDestinosEnMapa(coordenadas) {
    var destinos = [];  

    coordenadas.forEach(function(coordenada) {
        var latitud = parseFloat(coordenada.latitud);
        var longitud = parseFloat(coordenada.longitud);

        var destino = L.latLng(latitud, longitud);

        destinos.push(destino);  
        var nombreDestino = coordenada.destino;

        
        L.marker(destino).addTo(map)
            .bindPopup("Destino: " + nombreDestino + "<br>Latitud: " + latitud + "<br>Longitud: " + longitud)
            .openPopup();
    });

    calcularRuta(destinos);
}

function calcularRuta(destinos) {
    if (destinos.length < 2) {
        return;
    }

    L.Routing.control({
        waypoints: destinos,
        routeWhileDragging: true,
        createMarker: false
    }).addTo(map);
}

document.addEventListener("DOMContentLoaded", function () {

    var urlParams = new URLSearchParams(window.location.search);
    var coordenadasJSON = urlParams.get('coordenadas');
    coordenadas = JSON.parse(coordenadasJSON);
    
    map = L.map('map').setView([-33.431118, -56.013162], 8);
    
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '© OpenStreetMap'
    }).addTo(map);
    
    map.locate({ setView: true, maxZoom: 12 });
    
    map.on('locationfound', onLocationFound);
    
    map.on('locationerror', onLocationError);
    
});


