<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Nearest Places</title>
</head>
<body>
    <h1>Tempat Terdekat</h1>
    <ul id="places">
        <li>Sedang memuat...</li>
    </ul>

    <script>
        // Ambil lokasi pengguna
        navigator.geolocation.getCurrentPosition(function(position) {
            const latitude = position.coords.latitude;
            const longitude = position.coords.longitude;

            // Kirim lokasi ke server
            fetch('/nearest-places', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({ latitude, longitude })
            })
            .then(response => response.json())
            .then(data => {
                const placesList = document.getElementById('places');
                placesList.innerHTML = '';
                data.forEach(place => {
                    const li = document.createElement('li');
                    li.textContent = `${place.name} (${place.distance.toFixed(2)} km) ${place.rating}`;
                    placesList.appendChild(li);
                });
            })
            .catch(error => console.error('Error:', error));
        });
    </script>
</body>
</html>
