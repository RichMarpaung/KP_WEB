<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Rekomendasi Tempat</title>
</head>
<body>
    <h1>Rekomendasi Tempat</h1>
    <div id="recommendation">
        <p id="loading">Mengambil data rekomendasi...</p>
        <ul id="recommended-place"></ul>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Ambil lokasi pengguna
        navigator.geolocation.getCurrentPosition(function (position) {
            const latitude = position.coords.latitude;
            const longitude = position.coords.longitude;

            // Kirim lokasi ke server untuk mendapatkan rekomendasi
            fetch('/recommend-place', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({ latitude, longitude })
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Gagal memuat data rekomendasi');
                }
                return response.json();
            })
            .then(data => {
                const loadingElement = document.getElementById('loading');
                const recommendedPlace = document.getElementById('recommended-place');

                // Hapus teks loading
                loadingElement.style.display = 'none';

                // Jika ada tempat yang direkomendasikan
                if (data) {
                    const li = document.createElement('li');
                    li.textContent = `Rekomendasi: ${data.name},
                                      Alamat: ${data.address},
                                      Jarak: ${data.distance.toFixed(2)} km,
                                      Rating: ${data.rating}`;
                    recommendedPlace.appendChild(li);
                } else {
                    // Jika tidak ada data
                    recommendedPlace.textContent = 'Tidak ada rekomendasi tempat tersedia.';
                }
            })
            .catch(error => {
                console.error('Error:', error);
                document.getElementById('loading').textContent = 'Terjadi kesalahan saat memuat data rekomendasi.';
            });
        }, function (error) {
            console.error('Error mendapatkan lokasi:', error);
            document.getElementById('loading').textContent = 'Gagal mendapatkan lokasi pengguna.';
        });
    </script>
</body>
</html>
