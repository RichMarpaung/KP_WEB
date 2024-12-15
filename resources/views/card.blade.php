<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <form class="d-flex" action="#" method="GET">
                            <input class="form-control me-2" type="search" placeholder="Search by Place" aria-label="Search" name="search" id="search">
                            <button class="btn btn-outline-light" type="submit">Search</button>
                        </form>
                    </li>
                    <li class="nav-item ms-3">
                        <a href="#" class="btn btn-outline-light">Profile</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="bg-primary text-white py-4">
        <div class="container d-flex flex-row align-items-center">
            <!-- Text Section -->
            <div class="flex-grow-1 me-3">
                <h1 class="display-4">Rekomendasi Utama</h1>
                <p class="lead">Nikmati pengalaman terbaik dengan mengunjungi tempat favorit kami!</p>
            </div>
            <!-- Card Section -->
            <div class="card bg-light text-dark" style="max-width: 300px;">
                <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Recommendation 1">
                <div class="card-body">
                    <h6 class="card-title">Rekomendasi: Tempat B</h6>
                    <p class="card-text small">Rating: ⭐⭐⭐⭐⭐ (5.0)</p>
                    <p class="card-text small">Tempat ini menawarkan fasilitas lengkap dan pengalaman luar biasa.</p>
                    <a href="#" class="btn btn-primary btn-sm">Lihat Detail</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <h1 class="text-center mb-4 font-weight-bold">Tempat-Tempat di Dashboard</h1>
        <div class="row">
            <!-- Card 1 -->

            <div class="col-md-3 mb-4">
                <div class="card shadow-sm">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Place 1">
                    <div class="card-body">
                        <h5 class="card-title">Tempat A</h5>
                        <p class="card-text">Rating: ⭐⭐⭐⭐☆ (4.5)</p>
                        <p class="card-text">Deskripsi singkat tempat A.</p>
                        <a href="#" class="btn btn-primary">Lihat Detail</a>
                    </div>
                </div>
            </div>
            <!-- Card 2 -->

        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
