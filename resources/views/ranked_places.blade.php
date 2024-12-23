<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Peringkat Tempat</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <h1>Hasil Peringkat Tempat</h1>
    <h2>REkomen :{{ $rekomen['name'] }}</h2>
    @if (session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif

    <p>Lokasi Anda: Latitude {{ $latitude }}, Longitude {{ $longitude }}</p>

    <table>
        <thead>
            <tr>
                <th>Nama Tempat</th>
                <th>Alamat</th>
                <th>deskripsi</th>
                <th>Rating</th>
                <th>Jarak (km)</th>
                <th>Skor</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tempat as $place)
                <tr>
                    <td>{{ $place['name'] }}</td>
                    <td>{{ $place['address'] }}</td>
                    <td>{{ $place['description'] }}</td>
                    <td>{{ number_format($place['rating'], 2) }}</td>
                    <td>{{ number_format($place['distance'], 2) }}</td>
                    {{-- <td>{{ str_replace(',', '_', number_format($place['distance'], 2)) }}</td> --}}

                    <td>{{ number_format($place['score'], 5) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="/ranked-places">Coba Lagi</a>
</body>
</html>
