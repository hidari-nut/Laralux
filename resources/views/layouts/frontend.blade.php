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
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">


    <!-- Libraries Stylesheet -->
    <link href={{ asset('assets/lib/animate/animate.min.css') }} rel="stylesheet">
    <link href={{ asset('assets/lib/owlcarousel/assets/owl.carousel.min.css') }} rel="stylesheet">
    <link href={{ asset('assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }} rel="stylesheet" />

    <link rel="stylesheet" href={{ asset('assets/plugins/global/plugins.bundle.css') }}>
    <link rel="stylesheet" href={{ asset('assets/css/style.bundle.css') }}>

    <!-- Customized Bootstrap Stylesheet -->
    <link href={{ asset('assets/css/bootstrap.min.css') }} rel="stylesheet">


    <!-- Template Stylesheet -->
    <link href={{ asset('assets/css/style.css') }} rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Header Guest Start -->
        @guest
            <div class="container-fluid bg-dark px-0">
                <div class="row gx-0">
                    <div class="col-lg-3 bg-dark d-none d-lg-block">
                        <a href="index.html"
                            class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center">
                            <h1 class="m-0 text-primary text-uppercase">Laralux</h1>
                        </a>
                    </div>
                    <div class="col-lg-9">
                        <nav class="navbar navbar-expand-lg bg-dark navbar-dark p-3 p-lg-0">
                            <a href="index.html" class="navbar-brand d-block d-lg-none">
                                <h1 class="m-0 text-primary text-uppercase">Laralux</h1>
                            </a>
                            <button type="button" class="navbar-toggler" data-bs-toggle="collapse"
                                data-bs-target="#navbarCollapse">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                                <div class="navbar-nav mr-auto py-0">
                                    <a href="{{ route('home') }}" class="nav-item nav-link">Home</a>
                                    <a href="{{ route('membership') }}" class="nav-item nav-link">Membership</a>
                                    <a href="{{ route('hotels.index') }}" class="nav-item nav-link">Hotels</a>
                                    <a href="{{ route('report.index') }}" class="nav-item nav-link">Reports</a>
                                </div>
                                <div class="navbar-nav mr-auto py-0">

                                    <a href="#" class="btn rounded-0 py-4 px-md-5 d-none d-lg-block ml-2 text-white">
                                        <i class="bi bi-cart-fill"></i>
                                    </a>
                                    <a href="{{ route('login') }}"
                                        class="btn btn-primary rounded-0 py-4 px-md-5 d-none d-lg-block account-button">Login</a>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        @endguest
        <!-- Header Guest End -->

        <!-- Header Customer Start -->
        @can('viewCustomer', Auth::user())
            <div class="container-fluid bg-dark px-0">
                <div class="row gx-0">
                    <div class="col-lg-3 bg-dark d-none d-lg-block">
                        <a href="index.html"
                            class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center">
                            <h1 class="m-0 text-primary text-uppercase">Laralux</h1>
                        </a>
                    </div>
                    <div class="col-lg-9">
                        <nav class="navbar navbar-expand-lg bg-dark navbar-dark p-3 p-lg-0">
                            <a href="index.html" class="navbar-brand d-block d-lg-none">
                                <h1 class="m-0 text-primary text-uppercase">Laralux</h1>
                            </a>
                            <button type="button" class="navbar-toggler" data-bs-toggle="collapse"
                                data-bs-target="#navbarCollapse">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                                <div class="navbar-nav mr-auto py-0">
                                    <a href="{{ route('home') }}" class="nav-item nav-link">Home</a>
                                    <a href="{{ route('membership') }}" class="nav-item nav-link">Membership</a>

                                    <a href="{{ route('hotels.index') }}" class="nav-item nav-link">Hotels</a>
                                    <a href="{{ route('report.index') }}" class="nav-item nav-link">Reports</a>
                                </div>
                                <div class="navbar-nav mr-auto py-0">

                                    <a href="#" class="btn rounded-0 py-4 px-md-5 d-none d-lg-block ml-2 text-white">
                                        <i class="bi bi-cart-fill"></i>
                                    </a>
                                    <a href="{{ route('user.edit', Auth::id()) }}"
                                        class="btn btn-primary rounded-0 py-4 px-md-5 d-none d-lg-block account-button">{{ Auth::user()->name }}</a>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        @endcan
        <!-- Header Customer End -->

        <!-- Header Member Start -->
        @can('viewMember', Auth::user())
            <div class="container-fluid bg-dark px-0">
                <div class="row gx-0">
                    <div class="col-lg-3 bg-dark d-none d-lg-block">
                        <a href="index.html"
                            class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center">
                            <h1 class="m-0 text-primary text-uppercase">Laralux</h1>
                        </a>
                    </div>
                    <div class="col-lg-9">
                        <nav class="navbar navbar-expand-lg bg-dark navbar-dark p-3 p-lg-0">
                            <a href="index.html" class="navbar-brand d-block d-lg-none">
                                <h1 class="m-0 text-primary text-uppercase">Laralux</h1>
                            </a>
                            <button type="button" class="navbar-toggler" data-bs-toggle="collapse"
                                data-bs-target="#navbarCollapse">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                                <div class="navbar-nav mr-auto py-0">
                                    <a href="{{ route('home') }}" class="nav-item nav-link">Home</a>
                                    {{-- <a href="{{route('member.checkMemberBookings', ['user_id' => Auth::id()])}}" class="nav-item nav-link">Membership</a> --}}
                                    <a onclick="document.getElementById('membershipForm').submit();"
                                        class="nav-item nav-link">Membership</a>
                                    <form id="membershipForm" action="{{ route('member.checkMemberBookings') }}"
                                        method="POST" style="display:none;">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                                    </form>
                                    {{-- <a href="{{route('user.getAllMember')}}" class="nav-item nav-link">Membership</a> --}}
                                    <a href="{{ route('hotels.index') }}" class="nav-item nav-link">Hotels</a>
                                    <a href="{{ route('report.index') }}" class="nav-item nav-link">Reports</a>
                                </div>
                                <div class="navbar-nav mr-auto py-0">

                                    <a href="#"
                                        class="btn rounded-0 py-4 px-md-5 d-none d-lg-block ml-2 text-white">
                                        <i class="bi bi-cart-fill"></i>
                                    </a>
                                    <a href="{{ route('user.edit', Auth::id()) }}"
                                        class="btn btn-primary rounded-0 py-4 px-md-5 d-none d-lg-block account-button">{{ Auth::user()->name }}</a>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        @endcan
        <!-- Header Member End -->

        <!-- Header Staf Start -->
        @can('viewStaff', Auth::user())
            <div class="container-fluid bg-dark px-0">
                <div class="row gx-0">
                    <div class="col-lg-3 bg-dark d-none d-lg-block">
                        <a href="index.html"
                            class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center">
                            <h1 class="m-0 text-primary text-uppercase">Laralux</h1>
                        </a>
                    </div>
                    <div class="col-lg-9">
                        <nav class="navbar navbar-expand-lg bg-dark navbar-dark p-3 p-lg-0">
                            <a href="index.html" class="navbar-brand d-block d-lg-none">
                                <h1 class="m-0 text-primary text-uppercase">Laralux</h1>
                            </a>
                            <button type="button" class="navbar-toggler" data-bs-toggle="collapse"
                                data-bs-target="#navbarCollapse">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                                <div class="navbar-nav mr-auto py-0">
                                    <a href="{{ route('home') }}" class="nav-item nav-link">Home</a>
                                    <a href="{{ route('user.getAllMember') }}" class="nav-item nav-link">Members</a>
                                    <a href="{{ route('hotelList') }}" class="nav-item nav-link">Hotel</a>
                                    <a href="#" class="nav-item nav-link">Transactions</a>
                                </div>
                                <a href="{{ route('user.edit', Auth::id()) }}"
                                    class="btn btn-primary rounded-0 py-4 px-md-5 d-none d-lg-block account-button">{{ Auth::user()->name }}</a>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        @endcan
        <!-- Header Staf End -->

        <!-- Header Owner Start -->
        @can('viewOwner', Auth::user())
            <div class="container-fluid bg-dark px-0">
                <div class="row gx-0">
                    <div class="col-lg-3 bg-dark d-none d-lg-block">
                        <a href="index.html"
                            class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center">
                            <h1 class="m-0 text-primary text-uppercase">Laralux</h1>
                        </a>
                    </div>
                    <div class="col-lg-9">
                        <nav class="navbar navbar-expand-lg bg-dark navbar-dark p-3 p-lg-0">
                            <a href="index.html" class="navbar-brand d-block d-lg-none">
                                <h1 class="m-0 text-primary text-uppercase">Laralux</h1>
                            </a>
                            <button type="button" class="navbar-toggler" data-bs-toggle="collapse"
                                data-bs-target="#navbarCollapse">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                                <div class="navbar-nav mr-auto py-0">
                                    <a href="{{ route('home') }}" class="nav-item nav-link">Home</a>
                                    <a href="{{ route('user.getAllMember') }}" class="nav-item nav-link">Members</a>
                                    <a href="{{ route('user.index') }}" class="nav-item nav-link">Admin</a>
                                    <a href="{{ route('hotelList') }}" class="nav-item nav-link">Hotel</a>
                                    <a href="#" class="nav-item nav-link">Transactions</a>
                                </div>
                                <a href="{{ route('user.edit', Auth::id()) }}"
                                    class="btn btn-primary rounded-0 py-4 px-md-5 d-none d-lg-block account-button">{{ Auth::user()->name }}</a>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        @endcan
        <!-- Header Owner End -->

        @yield('content')

        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-light footer wow fadeIn" data-wow-delay="0.1s">
            <div class="container pb-5">
                <div class="row g-5">
                    <div class="col-md-6 col-lg-4">
                        <div class="bg-primary rounded p-4">
                            <a href="index.html">
                                <h1 class="text-white text-uppercase mb-3">Hotelier</h1>
                            </a>
                            <p class="text-white mb-0">
                                Download <a class="text-dark fw-medium"
                                    href="https://htmlcodex.com/hotel-html-template-pro">Hotelier– Premium Version</a>,
                                build a professional website for your hotel business and grab the attention of new
                                visitors upon your site’s launch.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <h6 class="section-title text-start text-primary text-uppercase mb-4">Contact</h6>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Blackbell Street, Denpasar, Bali
                        </p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+62 819 1612 9294</p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>snrp@gmail.com</p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social"
                                href="https://x.com/Lady_FanAccount/status/1799894234893259144"><i
                                    class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-social"
                                href="https://www.facebook.com/Bestoldiemusic/videos/rick-astley-never-gonna-give-you-up/1575858219482722/"><i
                                    class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social"
                                href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-12">
                        <div class="row gy-5 g-4">
                            <div class="col-md-6">
                                <h6 class="section-title text-start text-primary text-uppercase mb-4">Company</h6>
                                <a class="btn btn-link" href="">About Us</a>
                                <a class="btn btn-link" href="">Contact Us</a>
                                <a class="btn btn-link" href="">Privacy Policy</a>
                                <a class="btn btn-link" href="">Terms & Condition</a>
                                <a class="btn btn-link" href="">Support</a>
                            </div>
                            <div class="col-md-6">
                                <h6 class="section-title text-start text-primary text-uppercase mb-4">Developer</h6>
                                <a class="btn btn-link"
                                    href="https://mail.google.com/mail/?view=cm&fs=1&to=s160421069@student.ubaya.ac.id&su=Subject&body=Body">Viswanata</a>
                                <a class="btn btn-link"
                                    href="https://mail.google.com/mail/?view=cm&fs=1&to=s160421075@student.ubaya.ac.id&su=Subject&body=Body">Alvin</a>
                                <a class="btn btn-link"
                                    href="https://mail.google.com/mail/?view=cm&fs=1&to=s160421105@student.ubaya.ac.id&su=Subject&body=Body">Wahyu</a>
                                <a class="btn btn-link"
                                    href="https://mail.google.com/mail/?view=cm&fs=1&to=s160421109@student.ubaya.ac.id&su=Subject&body=Body">Pramodia</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>



    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src={{ asset('assets/lib/wow/wow.min.js') }}></script>
    <script src={{ asset('assets/lib/easing/easing.min.js') }}></script>
    <script src={{ asset('assets/lib/waypoints/waypoints.min.js') }}></script>
    <script src={{ asset('assets/lib/counterup/counterup.min.js') }}></script>
    <script src={{ asset('assets/lib/owlcarousel/owl.carousel.min.js') }}></script>
    <script src={{ asset('assets/lib/tempusdominus/js/moment.min.js') }}></script>
    <script src={{ asset('assets/lib/tempusdominus/js/moment-timezone.min.js') }}></script>
    <script src={{ asset('assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}></script>

    <!-- Template Javascript -->
    <script src={{ asset('assets/js/main.js') }}></script>
    @yield('javascript')
</body>

</html>
