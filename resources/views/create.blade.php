<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Add Place</title>

    <!-- Link ke Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css"/>

    <style>
        #map {
            height: 400px;
            width: 100%;
        }
    </style>
</head>
<body>

    <h1>Add New Place</h1>

    <!-- Peta Leaflet -->
    <div id="map"></div>

    <!-- Form untuk menambahkan tempat -->
    <form action="{{ route('admin.store') }}" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" required><br><br>

        <label for="address">Address:</label>
        <input type="text" name="address" required><br><br>

        <!-- Input untuk Latitude dan Longitude -->
        <input type="hidden" id="latitude" name="latitude" required>
        <input type="hidden" id="longitude" name="longitude" required>

        <button type="submit">Save Place</button>
    </form>

    <!-- Script Leaflet -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        // Inisialisasi peta
        var map = L.map('map').setView([51.505, -0.09], 13); // Lokasi default
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        var marker = L.marker([51.505, -0.09], { draggable: true }).addTo(map);
        marker.on('dragend', function(event) {
            var position = event.target.getLatLng();
            document.getElementById('latitude').value = position.lat;
            document.getElementById('longitude').value = position.lng;
        });
    </script>

</body>
