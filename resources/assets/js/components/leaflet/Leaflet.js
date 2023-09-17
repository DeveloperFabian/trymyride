import 'leaflet/dist/leaflet.css';
import L from 'leaflet';
import 'leaflet-control-geocoder/dist/Control.Geocoder.css';
import 'leaflet-control-geocoder/dist/Control.Geocoder.js';

document.addEventListener('DOMContentLoaded', async function () {
    if ("geolocation" in navigator) {
        navigator.geolocation.getCurrentPosition(async function (position) {
            const userLat = position.coords.latitude;
            const userLon = position.coords.longitude;

            const map = L.map('map').setView([userLat, userLon], 13);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

            const searchScreen = document.getElementById('search-screen');
            const detailsScreen = document.getElementById('details-screen');
            const placeInput = document.getElementById('place-input');
            const searchButton = document.getElementById('search-button');
            const placeDetails = document.getElementById('place-details');
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            searchButton.addEventListener('click', async () => {
                const placeName = placeInput.value;

                const response = await fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${placeName}`);
                const data = await response.json();

                if (data && data.length > 0) {
                    const result = data[0];
                    const lat = parseFloat(result.lat);
                    const lon = parseFloat(result.lon);

                    map.setView([lat, lon], 13);

                    placeDetails.innerHTML = `
                        <p><strong>Nombre:</strong> ${result.display_name}</p>
                        <p><strong>Tipo:</strong> ${result.type}</p>
                    `;

                    axios.post("/maps/store", {
                        name: result.display_name,
                        description: result.type
                    }, {
                        headers: {
                            'X-CSRF-TOKEN': csrfToken,
                            'X-Requested-With': 'XMLHttpRequest',
                            'Accept': 'application/json',
                        }
                    })
                        .then(response => {
                            if (response.data.status === 200) {
                                Swal.fire(
                                    'Busqueda realizada',
                                    'Cargando...',
                                    'success'
                                )
                            } else {
                                console.log(error)

                            }
                        })
                        .catch(error => {
                            console.log(error)
                        });
                    detailsScreen.style.display = 'block';
                } else {
                    Swal.fire(
                        'Busqueda fallida',
                        'No hay resultado para esta ubicación',
                        'error'
                    )
                }
            });
        });
    } else {
        Swal.fire(
            'Busqueda fallida',
            'La geolocalización no está disponible en este navegador',
            'error'
        )
    }
});