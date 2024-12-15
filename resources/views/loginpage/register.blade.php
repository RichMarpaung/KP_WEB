<!DOCTYPE html>
<html lang="en" dir="ltr" data-startbar="light" data-bs-theme="light">


<!-- Mirrored from mannatthemes.com/rizz/default/auth-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 28 Oct 2024 04:54:51 GMT -->
<head>


        <meta charset="utf-8" />
                <title>Rizz | Rizz - Admin & Dashboard Template</title>
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
                <meta content="" name="author" />
                <meta http-equiv="X-UA-Compatible" content="IE=edge" />

                <!-- App favicon -->
                <link rel="shortcut icon" href="assets/images/favicon.ico">


         <!-- App css -->
         <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
         <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
         <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />

    </head>


    <!-- Top Bar Start -->
    <body>
        <div class="page-content ">
            <nav class="navbar navbar-expand-lg navbar-light bg-light mt-2">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">
                        <img src="assets/images/logo-sm.png" height="26" alt="" class="me-2">
                        <img src="assets/images/logo-dark.png" height="16" alt="">
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
        <div class="row vh-100 d-flex justify-content-center">
            <div class="col-12 align-self-center">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4 mx-auto">
                            <div class="card">

                                <div class="card-body pt-0">
                                    <form class="my-4" method="POST" action="#">

                                        @csrf
                                        <input type="hidden" name="role_id" value="2">

                                        <div class="form-group mb-2">
                                            <label class="form-label">Name</label>
                                            <input class="form-control" type="text" name="name" required>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label>Email</label>
                                            <input class="form-control" type="email" name="email" required>
                                        </div>

                                        <div class="form-group mb-2">
                                            <label>Password</label>
                                            <input class="form-control" type="password" name="password" required>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label>Confirm Password</label>
                                            <input class="form-control" type="password" name="confirm_password" required>
                                        </div>
                                        <div class="d-grid ">
                                            <button  type="submit" class="btn btn-primary">Sign Up</button>
                                        </div>

                                    </form>

                                    <div class="text-center">
                                        <p class="text-muted">Already have an account ?  <a href="auth-login.html" class="text-primary ms-2">Log in</a></p>
                                    </div>
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
