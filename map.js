// Configuration object for map settings
const mapConfig = {
    location: { 
        lat: 14.5508, 
        lng: 121.0509 
    },
    zoom: 15,
    businessName: "ST Moto & Gears - Bonifacio Global City",
    address: {
        line1: "32nd Street corner 4th Avenue, Bonifacio Global City, Taguig, Philippines",
        city: "Taguig",
        region: "National Capital Region",
        zip: "1634"
    },
    rating: 4.6,
    reviews: 145
};

// Initialize the map when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    initMap();
    
    // Example of how to update region and store values dynamically
    // Uncomment and modify as needed
    /*
    document.getElementById('region').textContent = 'New Region';
    document.getElementById('store').textContent = 'Store Name';
    */
});

function initMap() {
    // Create map centered at the location
    const map = L.map('map').setView([mapConfig.location.lat, mapConfig.location.lng], mapConfig.zoom);
    
    // Add OpenStreetMap tile layer
    L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
        attribution: '&copy; CartoDB'
      }).addTo(map);
      
    
    // Create custom icon (optional)
    const customIcon = L.icon({
        iconUrl: 'https://unpkg.com/leaflet@1.9.4/dist/images/marker-icon.png',
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowUrl: 'https://unpkg.com/leaflet@1.9.4/dist/images/marker-shadow.png',
        shadowSize: [41, 41]
    });
    
    // Create popup content
    const popupContent = `
        <div class="location-info">
            <h3>${mapConfig.businessName}</h3>
            <p>${mapConfig.address.line1}</p>
            <p>${mapConfig.address.city}, ${mapConfig.address.region} ${mapConfig.address.zip}</p>
            <p><a href="https://www.openstreetmap.org/directions?from=&to=${mapConfig.location.lat},${mapConfig.location.lng}" target="_blank">Directions</a></p>
            <div class="rating">${mapConfig.rating} ${'★'.repeat(Math.floor(mapConfig.rating))}${'☆'.repeat(5-Math.floor(mapConfig.rating))} (${mapConfig.reviews} reviews)</div>
            <a href="https://www.openstreetmap.org/?mlat=${mapConfig.location.lat}&mlon=${mapConfig.location.lng}#map=17/${mapConfig.location.lat}/${mapConfig.location.lng}" target="_blank">View larger map</a>
        </div>
    `;
    
    // Add marker with popup
    const marker = L.marker([mapConfig.location.lat, mapConfig.location.lng], {icon: customIcon})
        .addTo(map)
        .bindPopup(popupContent);
    
    // Open popup by default
    marker.openPopup();
}

// Function to handle "View larger map" click
function viewLargerMap() {
    window.open(`https://www.openstreetmap.org/?mlat=${mapConfig.location.lat}&mlon=${mapConfig.location.lng}#map=17/${mapConfig.location.lat}/${mapConfig.location.lng}`, '_blank');
}