@extends('layouts.frontend')
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 p-0"
        style="background-image: url({{ asset('assets/img/carousel-1.jpg') }});">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center pb-5">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Reports</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Reports</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <div class="container">
        <div class="card">
            <div class="card-header">
                3 Most Reserved Hotel Products
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>
                                Room Name
                            </th>

                            <th>
                                Hotel Name
                            </th>

                            <th>
                                Reservation Count
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($rooms as $r)
                            <tr>
                                <th>
                                    {{ $r->room_name }}
                                </th>

                                <th>
                                    {{ $r->hotel_name }}
                                </th>

                                <th>
                                    {{ $r->reservation_count }}
                                </th>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                Customers with the most Purchases
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>
                                Customer Name
                            </th>
                            <th>
                                Purchases
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($bookings as $b)
                            <tr>
                                <th>
                                    {{ $b->username }}
                                </th>

                                <th>
                                    {{ $b->total_bookings }}
                                </th>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                Customers with the Most Membership Points
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>
                                Customer Name
                            </th>
                            <th>
                                Purchases
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($points as $p)
                            <tr>
                                <th>
                                    {{ $p->username }}
                                </th>

                                <th>
                                    {{ $p->total_points }}
                                </th>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    @endsection
    @section('javascript')
    @endsection
