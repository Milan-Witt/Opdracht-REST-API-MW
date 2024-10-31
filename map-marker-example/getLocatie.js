// getLocation.js

const fetch = require('node-fetch');

async function getCoordinates(city) {
    const url = `https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(city)}`;
    
    try {
        const response = await fetch(url, {
            method: 'GET',
            headers: { 'Accept': 'application/json' }
        });

        if (!response.ok) throw new Error(`HTTP error! Status: ${response.status}`);

        const data = await response.json();
        
        if (data.length === 0) {
            console.log(`No coordinates found for ${city}`);
            return null;
        }

        const { lat, lon } = data[0];
        console.log(`Coordinates for ${city}: Latitude = ${lat}, Longitude = ${lon}`);
        return { lat, lon };
    } catch (error) {
        console.error('Error fetching data:', error);
    }
}

// Run the function to get coordinates
getCoordinates('Roermond').then(coords => {
    if (coords) {
        console.log(`Latitude: ${coords.lat}, Longitude: ${coords.lon}`);
    }
});
