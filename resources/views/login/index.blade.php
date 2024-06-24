<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Laralux</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="assets/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">  

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href={{asset('assets/lib/animate/animate.min.css')}} rel="stylesheet">
    <link href={{asset('assets/lib/owlcarousel/assets/owl.carousel.min.css')}} rel="stylesheet">
    <link href={{asset('assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}} rel="stylesheet" />

    <link rel="stylesheet" href={{asset('assets/plugins/global/plugins.bundle.css')}}>
    <link rel="stylesheet" href={{asset('assets/css/style.bundle.css')}}>

    <!-- Customized Bootstrap Stylesheet -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Header Start -->
        <div class="container-fluid bg-dark px-0">
            <div class="row gx-0">
                <div class="col-lg-3 bg-dark d-none d-lg-block">
                    <a href="index.html" class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center">
                        <h1 class="m-0 text-primary text-uppercase">Laralux</h1>
                    </a>
                </div>
                <div class="col-lg-9">
                    <nav class="navbar navbar-expand-lg bg-dark navbar-dark p-3 p-lg-0">
                        <a href="index.html" class="navbar-brand d-block d-lg-none">
                            <h1 class="m-0 text-primary text-uppercase">Laralux</h1>
                        </a>
                        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                                 </div>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Header End -->


        
    <!-- Login Start -->
    <div class="container login mt-5 wow fadeIn">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                    <div class="text-center mb-4">
                        <h3 class="text-primary">LOG IN</h3>
                    </div>
                    <form method="POST" action="#">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email"
                                class="form-control @error('email') is-invalid @enderror" required autocomplete="email"
                                autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" name="password"
                                class="form-control @error('password') is-invalid @enderror" required
                                autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-primary w-100 py-3">
                                {{ __('Login') }}
                            </button>
                        </div>
                        <div class="form-group text-center mt-3">
                                <a class="btn btn-link" href="#">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Login End -->



        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-light footer wow fadeIn" data-wow-delay="0.1s">
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="#">Denpasargrad</a>, All Right Reserved. 
							
							<!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
							Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" ></script>
    <script src={{asset('assets/lib/wow/wow.min.js')}} ></script>
    <script src={{asset('assets/lib/easing/easing.min.js')}} ></script>
    <script src={{asset('assets/lib/waypoints/waypoints.min.js')}} ></script>
    <script src={{asset('assets/lib/counterup/counterup.min.js')}} ></script>
    <script src={{asset('assets/lib/owlcarousel/owl.carousel.min.js')}} ></script>
    <script src={{asset('assets/lib/tempusdominus/js/moment.min.js')}} ></script>
    <script src={{asset('assets/lib/tempusdominus/js/moment-timezone.min.js')}} ></script>
    <script src={{asset('assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js')}} ></script>

    <!-- Template Javascript -->
    <script src={{asset('assets/js/main.js')}} ></script>
    @yield('javascript')
</body>

</html>