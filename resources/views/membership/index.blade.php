@extends('layouts.frontend')
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 p-0"
        style="background-image: url({{ asset('assets/img/carousel-1.jpg') }});">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center pb-5">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Membership</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Membership</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Membership Customer Start -->
    @can('viewCustomer', Auth::user())
        <!-- Membership Start -->
        <div class="container-xxl py-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container text-center">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <i class="bi bi-building-check display-1 text-primary"></i>
                        <h1 class="display-1">Lara-LUXURY</h1>
                        <h1 class="mb-4">Join our membership for more benefit</h1>
                        <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam provident similique
                            temporibus illum ad minus sapiente aut quidem ex possimus, rerum alias quis id cupiditate
                            praesentium iste vel fuga cumque.</p>
                        <a class="btn btn-primary py-3 px-5" href>Subscribe</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Membership End -->

        <!-- Benefit Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title text-center text-primary text-uppercase">Benefits</h6>
                    <h1 class="mb-5">Explore Lara-Luxury <span class="text-primary text-uppercase">Benefits</span></h1>
                </div>
                <div class="row g-4">
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <a class="service-item-mem text-center rounded" href>
                            <div class="service-icon bg-transparent rounded mx-auto mb-4 p-1">
                                <div class="w-100 h-100 rounded d-flex align-items-center justify-content-center">
                                    <i class="bi bi-house-check-fill fa-2x text-primary"></i>
                                </div>
                            </div>
                            <h5 class="mb-3">Member Points</h5>
                            <p class="text-body mb-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem
                                sed diam stet diam sed stet lorem.</p>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                        <a class="service-item-mem text-center rounded" href>
                            <div class="service-icon bg-transparent rounded mx-auto mb-4 p-1">
                                <div class="w-100 h-100 rounded d-flex align-items-center justify-content-center">
                                    <i class="bi bi-house-add-fill fa-2x text-primary"></i>
                                </div>
                            </div>
                            <h5 class="mb-3">Getting Member Points</h5>
                            <p class="text-body mb-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem
                                sed diam stet diam sed stet lorem.</p>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <a class="service-item-mem text-center rounded" href>
                            <div class="service-icon bg-transparent rounded mx-auto mb-4 p-1">
                                <div class="w-100 h-100 rounded d-flex align-items-center justify-content-center">
                                    <i class="bi bi-house-heart-fill fa-2x text-primary"></i>
                                </div>
                            </div>
                            <h5 class="mb-3">Redeem Member Points</h5>
                            <p class="text-body mb-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem
                                sed diam stet diam sed stet lorem.</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Benefit End -->
    @endcan
    <!-- Membership Customer End -->

    <!-- Membership Member Start -->
    @can('viewMember', Auth::user())
        <div class="container my-4">
            <div class='table-responsive'>
                <table class='table'>
                    <thead class="thead-light">
                        <tr>
                            <th>Date</th>
                            <th>Total Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookings as $booking)
                            <tr>
                                <td>{{ $booking->created_at }}</td>
                                <td>{{ $booking->total_price }}</td>
                                <td>
                                    <a class="btn btn-warning" data-toggle="modal" href="#detail{{ $booking->id }}">Details</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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

            <p>Points remaining: {{ $points_total }}</p>

            <div class='table-responsive'>
                <table class='table'>
                    <thead class="thead-light">
                        <tr>
                            <th>Point Increase/Decrease</th>
                            <th>Date</th>
                            {{-- <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($points as $point)
                            <tr>
                                <td>{{ $point->points }}</td>
                                <td>{{ $point->created_at }}</td>
                                {{-- <td></td>
                            <td></td>
                            <td></td> --}}
                                {{-- <td>
                                <form method="POST" action="#">
                                    <input type="submit" value="Delete" class="btn btn-danger"
                                        onclick="return confirm('Are you sure to delete Product A?');">
                                </form>
                            </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endcan
    <!-- Membership Member End -->


    <!-- Membership Owner Header Start-->
    @can('viewOwnerOrStaff', Auth::user())
        <div class="container my-4">
            <div class='table-responsive'>
                <table class='table'>
                    <thead class="thead-light">

<!-- Membership Owner Header Start-->
@can('viewOwnerOrStaff', Auth::user())
    <div class="container my-4">
        <div class='table-responsive'>
            <table class='table'>
                <thead class="thead-light">
                    <tr>
                        <th></th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Roles</th>
                        @can('viewOwner', Auth::user())
                            <th></th>
                            <th></th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @foreach($datas as $d)

                        <tr>
                            <th></th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Roles</th>
                            @can('viewOwner', Auth::user())
                                <th></th>
                                <th></th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $d)
                            <tr>
                                <th><img src="{{ '/assets/img/user' . asset($d->img) }}" alt=""
                                        style="width: 50px; height: 50px; object-fit: cover;"></th>
                                <td>{{ $d->id }}</td>
                                <td>{{ $d->name }}</td>
                                <td>{{ $d->email }}</td>
                                <td>{{ $d->role->name }}</td>
                                @can('viewOwner', Auth::user())
                                    @if ($d->roles_id == 3)
                                        <td>

                                            <form method="POST" action="{{ route('user.promote', $d->id) }}">
                                                @csrf
                                                @method('PUT')
                                                <input type="submit" value="Promote" class="btn btn-success"
                                                    onclick="return confirm('Are you sure to promote this user to member?');">
                                            </form>
                                        </td>
                                    @endif
                                    @if ($d->roles_id == 4)
                                        <td>
                                            <form method="POST" action="{{ route('user.demote', $d->id) }}">
                                                @csrf
                                                @method('PUT')
                                                <input type="submit" value="Demote" class="btn btn-danger"
                                                    onclick="return confirm('Are you sure to demote this member to customer?');">
                                            </form>
                                        </td>
                                    @endif
                                @endcan
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endcan
    <!-- Membership Owner Header End -->
@endsection

@section('javascript')
@endsection
