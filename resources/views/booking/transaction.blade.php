@extends('layouts.frontend')
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 p-0"
        style="background-image: url({{ asset('assets/img/carousel-1.jpg') }});">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center pb-5">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Transactions</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Transactions</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Transaction Owner Header Start-->
    <div class="container my-4">
        {{-- <a class="btn btn-info text-white" href="#">Add Members</a>
        <a class="btn btn-warning text-white" data-toggle="modal" href="#">Disclaimer</a> --}}

        <div class='table-responsive'>
            <table class='table'>
                <thead class="thead-light">
                    <tr>
                        <th>Date</th>
                        <th>Total Price</th>
                        <th>User email</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookings as $booking)
                        <tr>
                            <td>{{ $booking->created_at }}</td>
                            <td>{{ $booking->total_price }}</td>
                            <td>{{ $booking->user->email }}</td>
                            <td>
                                <a class="btn btn-warning" data-toggle="modal" href="#detail{{ $booking->id }}">Details</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @foreach ($bookings as $booking)
        <div class="modal fade" id="detail{{ $booking->id }}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Booking Details</h4>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4">
                                    @foreach ($booking->bookingDetails as $bookingDetail)
                                        <div class="card mb-4 box-shadow">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $bookingDetail->rooms_id }}</h5>
                                                <p class="card-text">Check in date : {{ $bookingDetail->check_in }}
                                                </p>
                                                <p class="card-text">Check out date :
                                                    {{ $bookingDetail->check_out }}</p>
                                                <p class="card-text">Quantity : {{ $bookingDetail->qty }}</p>
                                            </div>
                                        </div>

                                        <hr>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>
    @endforeach

    <!-- Transaction Owner Header End -->

    {{-- <!-- Transaction Staf Header Start-->
    <div class="container my-4">
        <div class='table-responsive'>
            <table class='table'>
                <thead class="thead-light">
                    <tr>
                        <th>ID Transaksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>0001</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Transaction Staf Header End --> --}}
@endsection
@section('javascript')
@endsection
