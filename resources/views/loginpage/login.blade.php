<!DOCTYPE html>
<html lang="en" dir="ltr" data-startbar="light" data-bs-theme="light">


<head>

       <meta charset="utf-8" />
                <title>KPI | LOGIN</title>
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
                <meta content="" name="author" />
                <meta http-equiv="X-UA-Compatible" content="IE=edge" />

                <!-- App favicon -->
                <link rel="shortcut icon" href="{{ asset('assets/images/logo.png') }}">


         <!-- App css -->
         <link rel="stylesheet" href="{{ asset('assets/libs/jsvectormap/css/jsvectormap.min.css') }}">
         <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
         <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
         <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />


    </head>


    <!-- Top Bar Start -->
    <body >
        <div class="page-content mb-5">
            <nav class="navbar navbar-expand-lg navbar-light bg-light mt-2">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">
                        <img src="assets/images/Logo.png" height="50" alt="" class="me-2">
                        {{-- <img src="assets/images/tulis2.png" height="16" alt=""> --}}
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent3" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent3">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " aria-current="page" href="#">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Petunjuk</a>
                            </li>


                        </ul>
                        <h5>
                        <a class="nav-link active" aria-current="page" href="#">Login</a>
                    </h5>
                    </div>
                </div><!--end container-->
            </nav>
    </div>
    <div class="container-xxl">
        <div class="row d-flex justify-content-center">
            <div class="col-12 align-self-center">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4 mx-auto">
                            <div class="card">
                                <div class="card-body pt-0">
                                    <form class="my-4" action="{{ route('login.post') }}" method="POST">
                                        @csrf <!-- CSRF Token -->
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter your email" value="{{ old('email') }}" required>
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Enter your password" required>
                                            @error('password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <button type="submit" class="btn btn-primary w-100">Login</button>

                                    </form>
                                    @if (Session::has('status') && Session::get('status') === 'field')
                                    <div class="alert alert-danger text-center" role="alert">
                                        {{ Session::get('massage') }}
                                    </div>
                                @endif
                                    {{-- <div class="text-center  mb-2">
                                        <p class="text-muted">Don't have an account ?  <a href="/register" class="text-primary ms-2">Free Resister</a></p>
                                    </div> --}}

                                </div><!--end card-body-->
                            </div><!--end card-->
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end card-body-->
            </div><!--end col-->
        </div><!--end row-->
    </div><!-- container -->
    </body>
    <!--end body-->

</html>
