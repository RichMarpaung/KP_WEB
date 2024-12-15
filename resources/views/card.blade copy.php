<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom sidebar style */
        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            background-color: #343a40;
            padding-top: 20px;
        }
        .sidebar a {
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            display: block;
        }
        .sidebar a:hover {
            background-color: #575d63;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
        }
    </style>
</head>
<body class="bg-light">

    <!-- Sidebar -->
    <div class="sidebar">
        <h3 class="text-white text-center">Menu</h3>
        <a href="#">Dashboard</a>
        <a href="#">Profile</a>
        <a href="#">Settings</a>
        <a href="#">Logout</a>
    </div>

    <!-- Content Area -->
    <div class="content">
        <!-- Navbar -->


        <!-- Dashboard Title -->
        <h1 class="text-center mb-4 font-weight-bold">Tempat-Tempat di Dashboard</h1>

        <!-- Card Section -->
        <div class="row">
            <!-- Card 1 -->
            <div class="col-md-4 mb-4">
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
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Place 2">
                    <div class="card-body">
                        <h5 class="card-title">Tempat B</h5>
                        <p class="card-text">Rating: ⭐⭐⭐⭐⭐ (5.0)</p>
                        <p class="card-text">Deskripsi singkat tempat B.</p>
                        <a href="#" class="btn btn-primary">Lihat Detail</a>
                    </div>
                </div>
            </div>
            <!-- Card 3 -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Place 3">
                    <div class="card-body">
                        <h5 class="card-title">Tempat C</h5>
                        <p class="card-text">Rating: ⭐⭐⭐☆☆ (3.8)</p>
                        <p class="card-text">Deskripsi singkat tempat C.</p>
                        <a href="#" class="btn btn-primary">Lihat Detail</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
