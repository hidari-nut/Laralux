@extends('layouts.frontend')
@section('content')
    <!-- Customer Start -->
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 p-0"
        style="background-image: url({{ asset('assets/img/carousel-1.jpg') }});">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center pb-5">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Hotels</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Hotels</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Hotel Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4">
                @foreach ($hotelsDatas as $hotel)
                    <div class="col-lg-4 col-md-6 wow fadeInUp"
                        data-wow-delay={{ $loop->index % 3 == 0 ? '0.1s' : ($loop->index % 3 == 1 ? '0.3s' : '0.6s') }}>
                        <div class="room-item shadow rounded overflow-hidden">
                            <div class="position-relative">
                                <img class="img-fluid" src={{ asset('assets/img/room-1.jpg') }} alt="">
                                <small
                                    class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4">
                                    From
                                    IDR {{ $hotel->min_price }}</small>
                            </div>
                            <div class="p-4 mt-2">
                                <div class="d-flex justify-content-between mb-3">
                                    <h5 class="mb-0"> {{ $hotel->name }}</h5>
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
                                    <a></a>
                                    <a class="btn btn-sm btn-dark rounded py-2 px-4" href="{{ route('hotelShow', ['hotel' => $hotel->id]) }}">View Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Hotel End -->
    <!-- Customer End -->
@endsection
@section('javascript')
@endsection
