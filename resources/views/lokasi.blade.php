<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tempat Terdekat</title>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
</head>
<body>
    <h1>Tempat Terdekat</h1>
    <div id="location-info">
        <p>Menunggu lokasi pengguna...</p>
    </div>
    <ul id="places-list"></ul>

    <script>
        // Fungsi untuk mendapatkan lokasi pengguna
        function getUserLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(fetchPlaces, showError);
            } else {
                document.getElementById("location-info").innerHTML = "Geolokasi tidak didukung oleh browser ini.";
            }
        }

        // Jika berhasil mendapatkan lokasi
        function fetchPlaces(position) {
            const latitude = position.coords.latitude;
            const longitude = position.coords.longitude;

            document.getElementById("location-info").innerHTML = `Lokasi Anda: Latitude ${latitude}, Longitude ${longitude}`;


        }

        // Jika gagal mendapatkan lokasi
        function showError(error) {
            let errorMessage = "";

            switch (error.code) {
                case error.PERMISSION_DENIED:
                    errorMessage = "Pengguna menolak permintaan lokasi.";
                    break;
                case error.POSITION_UNAVAILABLE:
                    errorMessage = "Informasi lokasi tidak tersedia.";
                    break;
                case error.TIMEOUT:
                    errorMessage = "Permintaan lokasi memakan waktu terlalu lama.";
                    break;
                case error.UNKNOWN_ERROR:
                    errorMessage = "Terjadi kesalahan tidak diketahui.";
                    break;
            }

            document.getElementById("location-info").innerHTML = errorMessage;
        }

        // Panggil fungsi untuk mendapatkan lokasi pengguna
        getUserLocation();
    </script>
</body>
</html>
