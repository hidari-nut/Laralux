@extends('layouts.frontend')
@section('content')
    <!-- Customer Start -->

    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 p-0"
        style="background-image: url({{ asset('assets/img/carousel-2.jpg') }});">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center pb-5">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Hotel Detail</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Hotels</a></li>
                        <li class="breadcrumb-item"><a href="#">Hotels</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Hotel Detail</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Hotel Detail Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">

                <div class="col-lg-8">
                    <div id="room-carousel" class="carousel slide mb-5 wow fadeIn" data-bs-ride="carousel"
                        data-wow-delay="0.1s">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="img-fluid" src="{{ '/assets/img/hotels' . asset($hotelsDatas->image) }}" alt="{{ $hotelsDatas->image }}">
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-4">
                        <h1 class="mb-0">{{ $hotelsDatas->name }}</h1>
                        <div class="ps-3">
                            @php
                                $rating = $hotelsDatas->rating;
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
                    <p>{{ $hotelsDatas->description }}</p>
                    <p class="mb-5" style="text-align: justify;">Located in the heart of {{ $hotelsDatas->citys }},
                        {{ $hotelsDatas->name }} offers a
                        luxurious retreat
                        with stunning views and impeccable service. Whether you're here for business or leisure, our hotel
                        provides the perfect blend of comfort and convenience.Indulge in our spacious rooms and suites
                        designed for relaxation, each equipped with modern amenities
                        and elegant decor. Our dedicated staff is committed to ensuring your stay is memorable, catering to
                        your every need.Discover local attractions just steps away from our doorstep, including renowned
                        restaurants,
                        cultural landmarks, and vibrant nightlife. After a day of exploration, unwind at our rooftop bar
                        with panoramic city views or rejuvenate at our state-of-the-art spa.Experience the essence of luxury
                        at {{ $hotelsDatas->name }}, where every detail is crafted to exceed
                        your expectations. Book your stay with us and immerse yourself in unparalleled comfort and
                        sophistication.</p>
                    <div class="tab-class wow fadeInUp" data-wow-delay="0.1s">
                        <ul class="nav nav-pills d-flex justify-content-between border-bottom mb-4">
                            <li class="nav-item">
                                <a class="d-flex align-items-center py-3 active" data-bs-toggle="pill" href="#tab-1">
                                    <i class="fa fa-eye text-primary me-2"></i>
                                    <h6 class="mb-0">Overview</h6>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="d-flex align-items-center py-3" data-bs-toggle="pill" href="#tab-2">
                                    <i class="fa fa-map-marker-alt text-primary me-2"></i>
                                    <h6 class="mb-0">Location</h6>
                                </a>
                            </li>
                            {{-- <li class="nav-item">
                                <a class="d-flex align-items-center py-3" data-bs-toggle="pill" href="#tab-3">
                                    <i class="fa fa-star text-primary me-2"></i>
                                    <h6 class="mb-0">Reviews(3)</h6>
                                </a>
                            </li> --}}
                        </ul>
                        <div class="tab-content">
                            <div id="tab-1" class="tab-pane fade show p-0 active">
                                <p style="text-align: justify;">Discover {{ $hotelsDatas->name }}, a luxurious sanctuary
                                    nestled in the heart of
                                    {{ $hotelsDatas->citys }}. Offering unparalleled comfort and impeccable service, our
                                    hotel blends modern elegance with breathtaking views.
                                </p>
                                <p style="text-align: justify;">Indulge in spacious,
                                    well-appointed rooms and suites designed for relaxation. Immerse yourself in local
                                    culture with easy access to renowned restaurants, cultural landmarks, and vibrant
                                    nightlife. Whether for business or leisure, {{ $hotelsDatas->name }} promises an
                                    unforgettable stay, where every detail is tailored to exceed expectations.
                                </p>
                            </div>
                            <div id="tab-2" class="tab-pane fade show p-0">
                                <div class="row g-4 mb-4">
                                    <div class="col-md-4 d-flex align-items-center">
                                        <div class="flex-shrink-0 border rounded p-1 me-3"
                                            style="width: 45px; height: 45px;">
                                            <div
                                                class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                                <i class="fa fa-map-marker-alt text-primary"></i>
                                            </div>
                                        </div>
                                        <span>{{ $hotelsDatas->address }}, {{ $hotelsDatas->citys }},
                                            {{ $hotelsDatas->states }}, {{ $hotelsDatas->countrys }}</span>
                                    </div>
                                    <div class="col-md-4 d-flex align-items-center">
                                        <div class="flex-shrink-0 border rounded p-1 me-3"
                                            style="width: 45px; height: 45px;">
                                            <div
                                                class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                                <i class="fa fa-phone-alt text-primary"></i>
                                            </div>
                                        </div>
                                        <span>+628191612929x</span>
                                    </div>
                                    <div class="col-md-4 d-flex align-items-center">
                                        <div class="flex-shrink-0 border rounded p-1 me-3"
                                            style="width: 45px; height: 45px;">
                                            <div
                                                class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                                <i class="fa fa-envelope text-primary"></i>
                                            </div>
                                        </div>
                                        <span style="text-align: justify;">{{ $hotelsDatas->email }}</span>
                                    </div>
                                </div>
                                <iframe class="position-relative rounded w-100 h-100"
                                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12090.66040725795!2d{{ $hotelsDatas->longitude }}!3d{{ $hotelsDatas->latitude }}!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2z{{ $hotelsDatas->latitude }},{{ $hotelsDatas->longitude }}!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd"
                                    frameborder="0" style="min-height: 350px; border:0;" allowfullscreen
                                    aria-hidden="false" tabindex="0"></iframe>
                            </div>
                            {{-- <div id="tab-3" class="tab-pane fade show p-0">
                                <div class="mb-4">
                                    <h4 class="mb-4">3 Reviews</h4>
                                    <div class="d-flex mb-4">
                                        <img src={{ asset('assets/img/user.jpg" class="img-fluid rounded') }}
                                            style="width: 45px; height: 45px;">
                                        <div class="ps-3">
                                            <h6>John Doe <small class="text-body fw-normal fst-italic">01 Jan
                                                    2045</small></h6>
                                            <div class="mb-2">
                                                <small class="fa fa-star text-primary"></small>
                                                <small class="fa fa-star text-primary"></small>
                                                <small class="fa fa-star text-primary"></small>
                                                <small class="fa fa-star text-primary"></small>
                                                <small class="fa fa-star text-primary"></small>
                                            </div>
                                            <p class="mb-2">Diam amet duo labore stet elitr invidunt ea clita ipsum
                                                voluptua, tempor labore
                                                accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed
                                                eirmod</p>
                                        </div>
                                    </div>
                                    <div class="d-flex mb-4">
                                        <img src={{ asset('assets/img/user.jpg" class="img-fluid rounded') }}
                                            style="width: 45px; height: 45px;">
                                        <div class="ps-3">
                                            <h6>John Doe <small class="text-body fw-normal fst-italic">01 Jan
                                                    2045</small></h6>
                                            <div class="mb-2">
                                                <small class="fa fa-star text-primary"></small>
                                                <small class="fa fa-star text-primary"></small>
                                                <small class="fa fa-star text-primary"></small>
                                                <small class="fa fa-star text-primary"></small>
                                                <small class="fa fa-star text-primary"></small>
                                            </div>
                                            <p class="mb-2">Diam amet duo labore stet elitr invidunt ea clita ipsum
                                                voluptua, tempor labore
                                                accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed
                                                eirmod</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-light p-4 p-md-5">
                                    <h4 class="mb-4">Leave A Review</h4>
                                    <form>
                                        <div class="row g-3">
                                            <div class="col-12 d-flex align-items-center">
                                                <h6 class="mb-0 me-2">Rate Me:</h6>
                                                <div class="star-rating fs-3 me-2">
                                                    <i class="fa fa-star" data-value="1"></i>
                                                    <i class="fa fa-star" data-value="2"></i>
                                                    <i class="fa fa-star" data-value="3"></i>
                                                    <i class="fa fa-star" data-value="4"></i>
                                                    <i class="fa fa-star" data-value="5"></i>
                                                </div><input type="hidden" id="halfstarsInput" name="rating"
                                                    value="">
                                            </div>
                                            <div class="col-12">
                                                <textarea class="form-control bg-white border-0" rows="5" placeholder="Comment"></textarea>
                                            </div>
                                            <div class="col-12">
                                                <button class="btn btn-primary w-100 py-3" type="submit">Leave Your
                                                    Review</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">


                    <div class="bg-light p-4 mb-5 wow fadeInUp" data-wow-delay="0.1s">
                        <h4 class="section-title text-start mb-4">Category</h4>
                        <a class="d-block position-relative mb-3" href>
                            <img class="img-fluid" src={{ asset('assets/img/cat-1.jpg') }} alt>
                            <div class="d-flex position-absolute top-0 start-0 w-100 h-100 p-3"
                                style="background: rgba(0,0,0,.3);">
                                <h5 class="text-white m-0 mt-auto">{{ $hotelsDatas->type }}</h5>
                            </div>
                        </a>
                        <h4 class="section-title text-start mb-4">Rooms</h4>
                        <a href="{{ route('roomIndex', ['hotel' => $hotelsDatas->id]) }}"
                            class="btn btn-primary py-3 px-5 col-12 text-center wow fadeInUp" style="width: 100%;">Explore
                            The Rooms</a>
                    </div>


                </div>

            </div>
        </div>
    </div>
    <!-- Hotel Detail End -->

    <!-- Related Hotel Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title text-center text-primary text-uppercase">Related Hotels</h6>
                <h1 class="mb-5">Explore More <span class="text-primary text-uppercase">Hotels</span></h1>
            </div>
            <div class="row g-4">
                @foreach ($hotelsRec as $rec)
                    <div class="col-lg-4 col-md-6 wow fadeInUp"
                        data-wow-delay={{ $loop->index % 3 == 0 ? '0.1s' : ($loop->index % 3 == 1 ? '0.3s' : '0.6s') }}>
                        <div class="room-item shadow rounded overflow-hidden">
                            <div class="position-relative">
                                <img class="img-fluid" src="{{ '/assets/img/hotels' . asset($rec->image) }}" alt="{{ $rec->image }}">
                                <small
                                    class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4">
                                    From
                                    IDR {{ $rec->min_price }}</small>
                            </div>
                            <div class="p-4 mt-2">
                                <div class="d-flex justify-content-between mb-3">
                                    <h5 class="mb-0"> {{ $rec->name }}</h5>
                                    <div class="ps-2">
                                        @php
                                            $rating = $rec->rating;
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
                                <p class="text-body mb-3">{{ $rec->description }}</p>
                                <div class="d-flex justify-content-between">
                                    <a></a>
                                    <a class="btn btn-sm btn-dark rounded py-2 px-4"
                                        href="{{ route('hotelShow', ['hotel' => $rec->id]) }}">View Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.9s">
                    <a href ="{{ route('hotels.index') }}" class="btn btn-primary py-3 px-5">Explore All Hotels</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Hotel Detail End -->

    <!-- Customer End -->
@endsection
@section('javascript')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.star-rating .fa-star').forEach(star => {
                star.addEventListener('click', function() {
                    const value = this.getAttribute('data-value');
                    document.getElementById('halfstarsInput').value = value;

                    document.querySelectorAll('.star-rating .fa-star').forEach(s => {
                        s.classList.remove('checked');
                    });

                    for (let i = 0; i < value; i++) {
                        document.querySelectorAll('.star-rating .fa-star')[i].classList.add(
                            'checked');
                    }
                });
            });
        });
    </script>
@endsection
