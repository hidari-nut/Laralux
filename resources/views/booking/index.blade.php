@extends('layouts.frontend')
@section('content')
    <!-- Customer Start -->
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 p-0"
        style="background-image: url({{ asset('assets/img/carousel-1.jpg') }});">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center pb-5">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Booking</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Booking</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Booking Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title text-center text-primary text-uppercase">Room Booking</h6>
                <h1 class="mb-5">Book A <span class="text-primary text-uppercase">Luxury Room</span></h1>
            </div>
            <div class="row g-5">
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
                <div class="col-lg-6">
                    <div class="wow fadeInUp" data-wow-delay="0.2s">
                        <form>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="name" placeholder="Your Name">
                                        <label for="name">Your Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="email" placeholder="Your Email">
                                        <label for="email">Your Email</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating date" id="date3" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" id="checkin"
                                            placeholder="Check In" data-target="#date3" data-toggle="datetimepicker" />
                                        <label for="checkin">Check In</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating date" id="date4" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" id="checkout"
                                            placeholder="Check Out" data-target="#date4" data-toggle="datetimepicker" />
                                        <label for="checkout">Check Out</label>
                                    </div>
                                </div>
                                <!-- Adults Section -->
                                <div class="col-6">
                                    <label for="adults" class="form-label">Adults</label>
                                    <div class="input-group">
                                        <button type="button" class="btn btn-outline-secondary"
                                            id="adults-minus">-</button>
                                        <input type="text" class="form-control text-center" id="adults" value="1"
                                            readonly>
                                        <button type="button" class="btn btn-outline-secondary" id="adults-plus">+</button>
                                    </div>
                                </div>
                                <!-- Children Section -->
                                <div class="col-6">
                                    <label for="children" class="form-label">Children</label>
                                    <div class="input-group">
                                        <button type="button" class="btn btn-outline-secondary"
                                            id="children-minus">-</button>
                                        <input type="text" class="form-control text-center" id="children" value="0"
                                            readonly>
                                        <button type="button" class="btn btn-outline-secondary"
                                            id="children-plus">+</button>
                                    </div>
                                </div>
                                <!-- Rooms Section -->
                                <div class="col-6">
                                    <label for="rooms" class="form-label">Rooms</label>
                                    <div class="input-group">
                                        <button type="button" class="btn btn-outline-secondary"
                                            id="rooms-minus">-</button>
                                        <input type="text" class="form-control text-center" id="rooms"
                                            value="1" readonly>
                                        <button type="button" class="btn btn-outline-secondary"
                                            id="rooms-plus">+</button>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <select class="form-select" id="select3">
                                            <option value="1">Room 1</option>
                                            <option value="2">Room 2</option>
                                            <option value="3">Room 3</option>
                                        </select>
                                        <label for="select3">Selected Room(s)</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Special Request" id="message" style="height: 100px"></textarea>
                                        <label for="message">Special Request</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Book Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Booking End -->
    <!-- Customer End -->
@endsection
@section('javascript')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Adults
        document.getElementById('adults-plus').addEventListener('click', function () {
            let adults = document.getElementById('adults');
            adults.value = parseInt(adults.value) + 1;
        });
        document.getElementById('adults-minus').addEventListener('click', function () {
            let adults = document.getElementById('adults');
            if (adults.value > 1) {
                adults.value = parseInt(adults.value) - 1;
            }
        });

        // Children
        document.getElementById('children-plus').addEventListener('click', function () {
            let children = document.getElementById('children');
            children.value = parseInt(children.value) + 1;
        });
        document.getElementById('children-minus').addEventListener('click', function () {
            let children = document.getElementById('children');
            if (children.value > 0) {
                children.value = parseInt(children.value) - 1;
            }
        });

        // Rooms
        document.getElementById('rooms-plus').addEventListener('click', function () {
            let rooms = document.getElementById('rooms');
            rooms.value = parseInt(rooms.value) + 1;
        });
        document.getElementById('rooms-minus').addEventListener('click', function () {
            let rooms = document.getElementById('rooms');
            if (rooms.value > 1) {
                rooms.value = parseInt(rooms.value) - 1;
            }
        });
    });
</script>
@endsection
