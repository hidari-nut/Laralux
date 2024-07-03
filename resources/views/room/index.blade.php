@extends('layouts.frontend')
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 p-0" style="background-image: url({{ asset('assets/img/carousel-1.jpg') }});">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center pb-5">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Rooms</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Rooms</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Room Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title text-center text-primary text-uppercase">Our Rooms</h6>
                <h1 class="mb-5">Explore Our <span class="text-primary text-uppercase">Rooms</span></h1>
            </div>
            <div class="row g-4">
            @foreach ($roomsDatas as $room)
                <div class="col-lg-4 col-md-6 wow fadeInUp"
                     data-wow-delay="{{ $loop->index % 3 == 0 ? '0.1s' : ($loop->index % 3 == 1 ? '0.3s' : '0.6s') }}">
                    <div class="room-item shadow rounded overflow-hidden">
                        <div class="position-relative">
                            <img class="img-fluid" src="{{ '/assets/img/rooms' . asset($room->image) }}" alt="{{ $room->image }}">
                            <small class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4">
                                IDR {{ $room->price }}/Night
                            </small>
                        </div>
                        <div class="p-4 mt-2">
                            <div class="d-flex justify-content-between mb-3">
                                <h5 class="mb-0">{{ $room->name }}</h5>
                            </div>
                            <div class="d-flex mb-3">
                                @foreach ($room->products as $product)
                                    <small class="border-end me-3 pe-3">
                                        <i class="{{$product->icon}} text-primary me-2"></i>
                                    </small>
                                @endforeach
                            </div>
                            <p class="text-body mb-3">{{ $room->description }}</p>
                            <div class="d-flex justify-content-between">
                                <a></a>
                                <a class="btn btn-sm btn-dark rounded py-2 px-4" href="{{ route('roomShow', ['hotel' => $room->hotels_id, 'room' => $room->id]) }}">View Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
    <!-- Room End -->
@endsection

@section('javascript')
@endsection
