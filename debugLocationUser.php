<script src="https://maps.googleapis.com/maps/api/js?key=API_KEY&callback=initMap" defer></script>

<script>
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(
        (position) => {
            const userLocation = {
                lat: position.coords.latitude,
                lng: position.coords.longitude,
            };
            res.json(userLocation);
            console.log("Localização do usuário:", userLocation);
        },
        (error) => {
            console.error("Erro ao obter a localização:", error);
        }
      );
    } else {
      console.error("Geolocalização não é suportada pelo navegador");
    }

    function initMap() {
        map = new google.maps.Map(document.getElementById("map"), {
            center: { lat: -34.397, lng: 150.644 },
            zoom: 6,
        });
        infoWindow = new google.maps.InfoWindow();

        const locationButton = document.createElement("button");
        locationButton.textContent = "Pan to Current Location";
        locationButton.classList.add("custom-map-control-button");
        map.controls[google.maps.ControlPosition.TOP_CENTER].push(locationButton);

        locationButton.addEventListener("click", () => {
            if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                (position) => {
                const pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude,
                };
                infoWindow.setPosition(pos);
                infoWindow.setContent("Location found.");
                infoWindow.open(map);
                map.setCenter(pos);
                },
                () => {
                handleLocationError(true, infoWindow, map.getCenter());
                }
            );
            } else {
            handleLocationError(false, infoWindow, map.getCenter());
            }
        });
    }


</script>