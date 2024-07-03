@extends('layouts.frontend')
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 p-0"
        style="background-image: url({{ asset('assets/img/carousel-2.jpg') }});">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center pb-5">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Room Detail</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Hotels</a></li>
                        <li class="breadcrumb-item"><a href="#">Rooms</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Room Detail</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Room Detail Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-8">

                    <div id="room-carousel" class="carousel slide mb-5 wow fadeIn" data-bs-ride="carousel"
                        data-wow-delay="0.1s">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="img-fluid" src="{{ '/assets/img/rooms' . asset($roomDatas->image) }}"
                                    alt="{{ $roomDatas->image }}">
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-4">
                        <h1 class="mb-0">{{ $roomDatas->name }}</h1>
                    </div>
                    <div class="d-flex flex-wrap pb-4 m-n1">
                        @foreach ($roomDatas->products as $product)
                            <small class="bg-light rounded py-1 px-3 m-1"><i
                                    class="{{ $product->icon }} text-primary me-2"></i>{{ $product->qty }}
                                {{ $product->name }}
                            </small>
                        @endforeach
                    </div>
                    <p class="mb-5" style="text-align: justify;">
                        The {{ $roomDatas->name }} offers a perfect blend of elegance and comfort, designed to cater to
                        your
                        every need. With a capacity of {{ $roomDatas->capacity }} guests, this room provides ample space
                        for
                        relaxation or work. {{ $roomDatas->description }}. Each room is equipped with modern amenities
                        and
                        elegant decor to ensure a memorable stay. Whether you're here for business or leisure, the
                        {{ $roomDatas->name }} promises an exceptional experience with impeccable service and attention
                        to
                        detail. Enjoy your stay in our beautifully appointed room and take advantage of all the
                        luxurious
                        features we offer.
                    </p>
                </div>


                <div class="col-lg-4">



                    <div class="bg-light p-4 mb-5 wow fadeInUp" data-wow-delay="0.1s">
                        <h4 class="section-title text-start mb-4">Category</h4>
                        <a class="d-block position-relative mb-3" href>
                            <img class="img-fluid" src={{ asset('assets/img/cat-1.jpg') }} alt>
                            <div class="d-flex position-absolute top-0 start-0 w-100 h-100 p-3"
                                style="background: rgba(0,0,0,.3);">
                                <h5 class="text-white m-0 mt-auto">{{ $roomDatas->roomType->name }}</h5>
                            </div>
                        </a>
                    </div>


                    <div class="bg-light mb-5 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="border-bottom text-center text-dark p-3 pt-4 mb-3">
                            <span class="align-top fs-4 lh-base">IDR</span>
                            <span class="align-middle fs-1 lh-sm fw-bold">{{ $roomDatas->price }}</span>
                            <span class="align-bottom fs-6 lh-lg">/ Night</span>
                        </div>
                        <div class="row g-3 p-4 pt-2">
                            <div class="col-12">
                                <div class="date" id="date3" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" placeholder="Check in"
                                        data-target="#date3" data-toggle="datetimepicker" />
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="date" id="date4" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" placeholder="Check out"
                                        data-target="#date4" data-toggle="datetimepicker" />
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="adults" class="form-label">Adults</label>
                                <div class="input-group">
                                    <button type="button" class="btn btn-outline-secondary" id="adults-minus">-</button>
                                    <input type="text" class="form-control text-center" id="adults" value="0"
                                        readonly>
                                    <button type="button" class="btn btn-outline-secondary" id="adults-plus">+</button>
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="children" class="form-label">Children</label>
                                <div class="input-group">
                                    <button type="button" class="btn btn-outline-secondary" id="children-minus">-</button>
                                    <input type="text" class="form-control text-center" id="children" value="0"
                                        readonly>
                                    <button type="button" class="btn btn-outline-secondary" id="children-plus">+</button>
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="rooms" class="form-label">Rooms</label>
                                <div class="input-group">
                                    <button type="button" class="btn btn-outline-secondary" id="rooms-minus">-</button>
                                    <input type="text" class="form-control text-center" id="rooms" value="1"
                                        readonly>
                                    <button type="button" class="btn btn-outline-secondary" id="rooms-plus">+</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary py-3 w-100">Add to Cart</button>
                        </div>
                    </div>
                </div>


            </div>

        </div>
    </div>
    </div>
    <!-- Room Detail End -->

    <!-- Related Room Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title text-center text-primary text-uppercase">Related Rooms</h6>
                <h1 class="mb-5">Explore More <span class="text-primary text-uppercase">Rooms</span></h1>
            </div>
            <div class="row g-4">
                @foreach ($roomsRec as $room)
                    <div class="col-lg-4 col-md-6 wow fadeInUp"
                        data-wow-delay="{{ $loop->index % 3 == 0 ? '0.1s' : ($loop->index % 3 == 1 ? '0.3s' : '0.6s') }}">
                        <div class="room-item shadow rounded overflow-hidden">
                            <div class="position-relative">
                                <img class="img-fluid" src="{{ '/assets/img/rooms' . asset($room->image) }}"
                                    alt="{{ $room->image }}">
                                <small
                                    class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4">
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
                                            <i class="{{ $product->icon }} text-primary me-2"></i>
                                        </small>
                                    @endforeach
                                </div>
                                <p class="text-body mb-3">{{ $room->description }}</p>
                                <div class="d-flex justify-content-between">
                                    <a></a>
                                    <a class="btn btn-sm btn-dark rounded py-2 px-4"
                                        href="{{ route('roomShow', ['hotel' => $room->hotels_id, 'room' => $room->id]) }}">View
                                        Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.9s">
                    <a href="{{ route('roomIndex', ['hotel' => $roomDatas->hotels_id]) }}"
                        class="btn btn-primary py-3 px-5">Explore All Rooms</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Room Detail End -->
@endsection
@section('javascript')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Adults QTY
            document.getElementById('adults-plus').addEventListener('click', function() {
                let adults = document.getElementById('adults');
                adults.value = parseInt(adults.value) + 1;
            });
            document.getElementById('adults-minus').addEventListener('click', function() {
                let adults = document.getElementById('adults');
                if (adults.value > 1) {
                    adults.value = parseInt(adults.value) - 1;
                }
            });

            // Children QTY
            document.getElementById('children-plus').addEventListener('click', function() {
                let children = document.getElementById('children');
                children.value = parseInt(children.value) + 1;
            });
            document.getElementById('children-minus').addEventListener('click', function() {
                let children = document.getElementById('children');
                if (children.value > 0) {
                    children.value = parseInt(children.value) - 1;
                }
            });

            // Rooms QTY
            document.getElementById('rooms-plus').addEventListener('click', function() {
                let rooms = document.getElementById('rooms');
                rooms.value = parseInt(rooms.value) + 1;
            });
            document.getElementById('rooms-minus').addEventListener('click', function() {
                let rooms = document.getElementById('rooms');
                if (rooms.value > 1) {
                    rooms.value = parseInt(rooms.value) - 1;
                }
            });
        });
    </script>
@endsection
