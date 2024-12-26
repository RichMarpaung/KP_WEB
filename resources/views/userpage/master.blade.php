<!DOCTYPE html>
<html lang="en" dir="ltr" data-startbar="light" data-bs-theme="dark">

<head>


    <meta charset="utf-8" />
    <title>KPI | REKOMEND</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="shortcut icon" href="{{ asset('assets/images/Logo.png') }}">


    <link href="{{ asset('assets/libs/starability/starability-css/starability-all.css') }}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="{{ asset('assets/libs/jsvectormap/css/jsvectormap.min.css') }}">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/libs/animate.css/animate.min.css') }}" rel="stylesheet" type="text/css">

</head>

<body>
    <!-- Top Bar Start -->
    <div class="topbar d-print-none">
        <div class="container-xxl">
            <nav class="topbar-custom d-flex justify-content-between" id="topbar-custom">


                <ul class="topbar-item list-unstyled d-inline-flex align-items-center mb-0">
                    <li>
                        <button class="nav-link mobile-menu-btn nav-icon" id="togglemenu">
                            <i class="iconoir-menu-scale"></i>
                        </button>
                    </li>
                    <li class="mx-3 welcome-text">
                        <h3 class="mb-0 fw-bold text-truncate">Hello, {{ Auth::user()->name }}!</h3>
                    </li>
                </ul>
                <ul class="topbar-item list-unstyled d-inline-flex align-items-center mb-0">
                    <li class="topbar-item">
                        <a class="nav-link nav-icon" href="javascript:void(0);" id="light-dark-mode">
                            <i class="icofont-moon dark-mode"></i>
                            <i class="icofont-sun light-mode"></i>
                        </a>
                    </li>
                    <li class="dropdown topbar-item">
                        <a class="nav-link dropdown-toggle arrow-none nav-icon" data-bs-toggle="dropdown" href="#"
                        role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="las la-user  thumb-lg rounded-circle"></i>
                        {{-- <img src="{{ asset('assets/images/users/avatar-1.jpg') }}" alt="" class="thumb-lg rounded-circle"> --}}
                    </a>
                    <div class="dropdown-menu dropdown-menu-end py-0">
                        <div class="d-flex align-items-center dropdown-item py-2 bg-secondary-subtle">
                            <div class="flex-shrink-0">
                                <i class="las la-user fs-18 me-1 align-text-bottom thumb-md rounded-circle"></i>
                                    {{-- <img src="{{ asset('assets/images/users/avatar-1.jpg') }}" alt=""
                                        class="thumb-md rounded-circle"> --}}
                                </div>
                                <div class="flex-grow-1 ms-2 text-truncate align-self-center">
                                    <h6 class="my-0 fw-medium text-dark fs-13">{{ Auth::user()->name }}</h6>
                                    <small class="text-muted mb-0">{{ Auth::user()->role->name }}</small>
                                </div><!--end media-body-->
                            </div>
                            <div class="dropdown-divider mt-0"></div>
                            <small class="text-muted px-2 pb-1 d-block">Account</small>
                            <a class="dropdown-item" href="pages-profile.html"><i
                                    class="las la-user fs-18 me-1 align-text-bottom"></i> Profile</a>
                            <small class="text-muted px-2 py-1 d-block">Settings</small>
                            <a class="dropdown-item" href="pages-profile.html"><i
                                    class="las la-cog fs-18 me-1 align-text-bottom"></i>Account Settings</a>
                            <a class="dropdown-item" href="pages-profile.html"><i
                                    class="las la-lock fs-18 me-1 align-text-bottom"></i> Security</a>
                            <a class="dropdown-item" href="pages-faq.html"><i
                                    class="las la-question-circle fs-18 me-1 align-text-bottom"></i> Help Center</a>
                            <div class="dropdown-divider mb-0"></div>
                            <form id="logout-form" action="{{ route('logout') }}" method="GET">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger my-1"><i
                                    class="las la-power-off fs-18 me-1 align-text-bottom"></i>Log Out</button>
                            </form>
                        </div>
                    </li>
                </ul><!--end topbar-nav-->
            </nav>

        </div>
    </div>
    <div class="startbar d-print-none">
        <!--start brand-->
        <div class="brand">
            <a href="index.html" class="logo">
                <span>
                    <img src="{{ asset('assets/images/logo.png') }}" alt="logo-small" class="logo-sm">
                </span>
                <span class="">
                    <img src="{{ asset('assets/images/tulis2.png') }}"  alt="logo-large" class="logo-lg logo-light">
                    <img src="{{ asset('assets/images/tulis2.png') }}" alt="logo-large" class="logo-lg logo-dark">
                </span>
            </a>
        </div>
        <!--end brand-->
        <!--start startbar-menu-->
        <div class="startbar-menu">
            <div class="startbar-collapse" id="startbarCollapse" data-simplebar>
                <div class="d-flex align-items-start flex-column w-100">
                    <!-- Navigation -->
                    <ul class="navbar-nav mb-auto w-100">
                        <li class="menu-label pt-0 mt-0">
                            <!-- <small class="label-border">
                            <div class="border_left hidden-xs"></div>
                            <div class="border_right"></div>
                        </small> -->
                            <span>Main Menu</span>
                        </li>
                        @if (Auth::user()->role->name === 'admin')
                        <li class="nav-item">
                            <a class="nav-link collapsed" href="/admin" role="button" aria-expanded="false" aria-controls="sidebarMaps">
                                <i class="iconoir-home menu-icon"></i>
                                <span>Dashboard</span>
                            </a>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#sidebarApplications" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApplications">
                                <i class="iconoir-view-grid menu-icon"></i>
                                <span>Manajemen Data</span>
                            </a>
                            <div class="collapse " id="sidebarApplications">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#sidebarAnalytics" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAnalytics">
                                            <span>Manajemen Tempat</span>
                                        </a>
                                        <div class="collapse " id="sidebarAnalytics">
                                            <ul class="nav flex-column">
                                                <li class="nav-item">
                                                    <a href="{{ route('admin.place.list') }}" class="nav-link ">List Tempat</a>
                                                </li><!--end nav-item-->
                                                <li class="nav-item">
                                                    <a href="{{ route('admin.place.create') }}" class="nav-link ">Tambah Tempat</a>
                                                </li><!--end nav-item-->
                                            </ul><!--end nav-->
                                        </div>
                                    </li><!--end nav-item-->
                                    <li class="nav-item">
                                        <a class="nav-link" href="#sidebarProjects" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarProjects">
                                            <span>Manajemen User</span>
                                        </a>
                                        <div class="collapse " id="sidebarProjects">
                                            <ul class="nav flex-column">

                                                <li class="nav-item">
                                                    <a class="nav-link" href="{{ route('admin.user.list') }}">List User</a>
                                                </li><!--end nav-item-->
                                                <li class="nav-item">
                                                    <a class="nav-link" href="{{ route('admin.user.create') }}">Tambah User</a>
                                                </li><!--end nav-item-->
                                            </ul><!--end nav-->
                                        </div>
                                    </li><!--end nav-item-->

                                </ul><!--end nav-->
                            </div><!--end startbarApplications-->
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link collapsed" href="/" role="button" aria-expanded="false" aria-controls="sidebarMaps">
                                <i class="iconoir-home menu-icon"></i>
                                <span>Dashboard</span>
                            </a>

                        </li>

                        @endif
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0);" onclick="getUserLocation()" role="button" aria-expanded="false"
                                aria-controls="sidebarDashboards">
                                <i class="iconoir-home-simple menu-icon"></i>
                                <span>Tempat KPI</span>
                            </a>

                        </li><!--end nav-item-->

                        <li class="menu-label mt-2">
                            <small class="label-border">
                                <div class="border_left hidden-xs"></div>
                                <div class="border_right"></div>
                            </small>
                            <span>Pengajuan</span>
                        </li>

                        @if (Auth::user()->role->name === 'admin')

                        @else
                        <li class="nav-item">
                            <a class="nav-link collapsed" href="/team" role="button" aria-expanded="false" aria-controls="sidebarMaps">
                                <i class="iconoir-profile-circle menu-icon"></i>
                                <span>Team</span>
                            </a>

                        </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" href="#sidebarForms" data-bs-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="sidebarForms">
                                <i class="iconoir-journal-page menu-icon"></i>
                                <span>Pengajuan KPI</span>
                            </a>
                            <div class="collapse " id="sidebarForms">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="forms-elements.html">Post Pengajuan</a>
                                    </li><!--end nav-item-->
                                    <li class="nav-item">
                                        <a class="nav-link" href="forms-advanced.html">Status</a>
                                    </li><!--end nav-item-->

                                </ul><!--end nav-->
                            </div><!--end startbarForms-->
                        </li><!--end nav-item-->

                        <li class="nav-item">
                            <a class="nav-link" href="#sidebarTables" data-bs-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="sidebarTables">
                                <i class="iconoir-table-rows menu-icon"></i>
                                <span>Berkas & Soft Copy</span>
                            </a>
                            <div class="collapse " id="sidebarTables">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="tables-basic.html">Lihat</a>
                                    </li><!--end nav-item-->
                                    <li class="nav-item">
                                        <a class="nav-link" href="tables-datatable.html">Update</a>
                                    </li><!--end nav-item-->

                                </ul><!--end nav-->
                            </div><!--end startbarTables-->
                        </li><!--end nav-item-->
                        <li class="nav-item">
                            <a class="nav-link" href="#sidebarIcons" role="button" aria-expanded="false"
                                aria-controls="sidebarIcons">
                                <i class="iconoir-suitcase menu-icon"></i>
                                <span>Status KPI</span>
                            </a>

                        </li><!--end nav-item-->

                        <li class="nav-item">
                            <a class="nav-link" href="#sidebarEmailTemplates" data-bs-toggle="collapse"
                                role="button" aria-expanded="false" aria-controls="sidebarEmailTemplates">
                                <i class="iconoir-send-mail menu-icon"></i>
                                <span>Laporan KPI</span>
                            </a>
                            <div class="collapse " id="sidebarEmailTemplates">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="email-templates-basic.html">Post</a>
                                    </li><!--end nav-item-->
                                    <li class="nav-item">
                                        <a class="nav-link" href="email-templates-alert.html">Update</a>
                                    </li><!--end nav-item-->
                                    <li class="nav-item">
                                        <a class="nav-link" href="email-templates-billing.html">Status</a>
                                    </li><!--end nav-item-->
                                </ul><!--end nav-->
                            </div><!--end startbarEmailTemplates-->
                        </li><!--end nav-item-->
                        <!--end navbar-nav--->

                </div>
            </div><!--end startbar-collapse-->
        </div><!--end startbar-menu-->
    </div><!--end startbar-->
    <div class="startbar-overlay d-print-none"></div>
    <!-- end leftbar-tab-menu-->

                        @yield('body')




        <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>
        <script src="{{ asset('assets/data/stock-prices.js') }}"></script>
        <script src="{{ asset('assets/libs/jsvectormap/js/jsvectormap.min.js') }}"></script>
        <script src="{{ asset('assets/libs/jsvectormap/maps/world.js') }}"></script>
        <script src="{{ asset('assets/js/pages/index.init.js') }}"></script>
        <script src="{{ asset('assets/js/app.js') }}"></script>
        <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
        <script src="{{ asset('assets/js/pages/sweet-alert.init.js') }}"></script>

        <script>
            // Fungsi untuk mendapatkan lokasi pengguna
            function getUserLocation() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(fetchPlaces, showError);
                } else {
                    alert("Geolokasi tidak didukung oleh browser ini.");
                }
            }

            // Jika berhasil mendapatkan lokasi
            function fetchPlaces(position) {
                const latitude = position.coords.latitude;
                const longitude = position.coords.longitude;

                // Redirect ke route dengan parameter latitude dan longitude
                const url = `/list-places?latitude=${latitude}&longitude=${longitude}`;
                window.location.href = url;
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

                alert(errorMessage);
            }
        </script>

</body>
<!--end body-->


</html>
