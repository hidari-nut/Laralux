@extends('layouts.frontend')
@section('content')
    <!-- Customer Start -->
    @can('viewCustorMember', Auth::user())
        <!-- Carousel Start -->
        <div class="container-fluid p-0 mb-5">
            <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="w-100" src={{ asset('assets/img/carousel-1.jpg') }} alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h6 class="section-title text-white text-uppercase mb-3 animated slideInDown">Luxury Living</h6>
                                <h1 class="display-3 text-white mb-4 animated slideInDown">Discover A Brand Luxurious Hotel</h1>
                                <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Explore Our
                                    Hotels</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Carousel End -->

        <!-- About Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <h6 class="section-title text-start text-primary text-uppercase">About Us</h6>
                        <h1 class="mb-4">Welcome to <span class="text-primary text-uppercase">Laralux</span></h1>
                        <p class="mb-4">At Laralux, we pride ourselves on offering a unique blend of opulence and warm
                            hospitality. Our hotels options is a haven for travelers seeking an exceptional stay, whether for
                            business or leisure.</p>
                        <div class="row g-3 pb-4">
                            <div class="col-sm-4 wow fadeIn" data-wow-delay="0.1s">
                                <div class="border rounded p-1">
                                    <div class="border rounded text-center p-4">
                                        <i class="fa fa-hotel fa-2x text-primary mb-2"></i>
                                        <h2 class="mb-1" data-toggle="counter-up">{{ $hotelsQty }}</h2>
                                        <p class="mb-0">Rooms</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 wow fadeIn" data-wow-delay="0.3s">
                                <div class="border rounded p-1">
                                    <div class="border rounded text-center p-4">
                                        <i class="fa fa-users-cog fa-2x text-primary mb-2"></i>
                                        <h2 class="mb-1" data-toggle="counter-up">{{ $statesQty }}</h2>
                                        <p class="mb-0">States</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 wow fadeIn" data-wow-delay="0.5s">
                                <div class="border rounded p-1">
                                    <div class="border rounded text-center p-4">
                                        <i class="fa fa-users fa-2x text-primary mb-2"></i>
                                        <h2 class="mb-1" data-toggle="counter-up">{{ $usersQty }}</h2>
                                        <p class="mb-0">Clients</p>
                                    </div>
                                </div>
                            </div>
                            {{-- <a class="btn btn-primary py-3 px-5 mt-2" href="">More Information<i class="fa fa-arrow-right ms-3"></i></a> --}}
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row g-3">
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.1s"
                                    src={{ asset('assets/img/about-1.jpg') }} style="margin-top: 25%;">
                            </div>
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.3s"
                                    src={{ asset('assets/img/about-2.jpg') }}>
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-50 wow zoomIn" data-wow-delay="0.5s"
                                    src={{ asset('assets/img/about-3.jpg') }}>
                            </div>
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.7s"
                                    src={{ asset('assets/img/about-4.jpg') }}>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->

        <!-- Hotel Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title text-center text-primary text-uppercase">Our Hotels</h6>
                    <h1 class="mb-5">Explore Our <span class="text-primary text-uppercase">Hotels</span></h1>
                </div>
                <div class="row g-4">
                    @foreach ($topRatedHotels as $hotel)
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="room-item shadow rounded overflow-hidden">
                                <div class="position-relative">
                                    <img class="img-fluid" src={{ asset('assets/img/room-1.jpg') }} alt="">
                                    <small
                                        class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4">From
                                        IDR {{ $hotel->min_price }}</small>
                                </div>
                                <div class="p-4 mt-2">
                                    <div class="d-flex justify-content-between mb-3">
                                        <h5 class="mb-0">{{ $hotel->name }}</h5>
                                        <div class="ps-2">
                                            @php
                                                $rating = $hotel->rating;
                                            @endphp
                                            @for ($i = 1; $i <= 5; $i++)
                                                @if ($i <= $rating)
                                                    <small class="fa fa-star text-primary"></small>
                                                @else
                                                    <small class="fa fa-star text-muted"></small>
                                                @endif
                                            @endfor
                                        </div>
                                    </div>
                                    <p class="text-body mb-3">{{ $hotel->description }}</p>
                                    <div class="d-flex justify-content-between">
                                        <a class="btn btn-sm btn-primary rounded py-2 px-4" href="">View Detail</a>
                                        <a class="btn btn-sm btn-dark rounded py-2 px-4" href="">Book Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Hotel End -->

        <!-- Testimonial Start -->
        <div class="container-xxl testimonial my-5 py-5 bg-dark wow zoomIn" data-wow-delay="0.1s">
            <div class="container">
                <div class="owl-carousel testimonial-carousel py-5">
                    @foreach ($latestReviews as $testimony)
                        <div class="testimonial-item position-relative bg-white rounded overflow-hidden">
                            <p>{{ $testimony->review }}</p>
                            <div class="d-flex align-items-center">
                                <img class="img-fluid flex-shrink-0 rounded" src='#' alt={{ $testimony->img }}
                                    style="width: 45px; height: 45px;">
                                <div class="ps-3">
                                    <h6 class="fw-bold mb-1">{{ $testimony->name }}</h6>
                                    <small>Laralux Customer</small>
                                </div>
                            </div>
                            <i class="fa fa-quote-right fa-3x text-primary position-absolute end-0 bottom-0 me-4 mb-n1"></i>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Testimonial End -->
    @endcan
    <!-- Customer End -->
    @can('viewOwnerOrStaff', Auth::user())
    <!-- Admin Start -->
    @include('report.index')
    <!-- Admin Start -->
    @endcan
@endsection
@section('javascript')
@endsection
