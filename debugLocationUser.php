<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />

<div id="map" style="width: 600px; height: 400px;"></div>

<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

<script>
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(
        (position) => {
            const userLocation = {
                lat: position.coords.latitude,
                lng: position.coords.longitude,
            };
            console.log("Localização do usuário:", userLocation);
            console.log("Lat do usuário:", userLocation['lat']);
        },
        (error) => {
            console.error("Erro ao obter a localização:", error);
        }
      );
    } else {
      console.error("Geolocalização não é suportada pelo navegador");
    }

    var map = L.map('map').setView([-30.0515328, -51.1705088], 12);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
    }).addTo(map);

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
            function(position) {
                var userLocation = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                L.marker([userLocation.lat, userLocation.lng]).addTo(map)
                    .bindPopup('Sua localização').openPopup();
            },
            function(error) {
                console.error("Erro ao obter a localização:", error);
            }
        );
    }
</script>