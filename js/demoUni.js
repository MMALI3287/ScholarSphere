
function initMap() {
    const mapElement = document.getElementById("map");
    const lat = parseFloat(mapElement.getAttribute("data-lat"));
    const lng = parseFloat(mapElement.getAttribute("data-lng"));
    const title = mapElement.getAttribute("data-title");

    const harvardLocation = { lat, lng };

    const map = new google.maps.Map(mapElement, {
        zoom: 15,
        center: harvardLocation,
    });

    const marker = new google.maps.Marker({
        position: harvardLocation,
        map: map,
        title: title,
    });
}
