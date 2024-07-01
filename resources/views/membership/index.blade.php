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
                                <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam provident similique temporibus illum ad minus sapiente aut quidem ex possimus, rerum alias quis id cupiditate praesentium iste vel fuga cumque.</p>
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
                                        <div
                                            class="w-100 h-100 rounded d-flex align-items-center justify-content-center">
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
                                        <div
                                            class="w-100 h-100 rounded d-flex align-items-center justify-content-center">
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
                                        <div
                                            class="w-100 h-100 rounded d-flex align-items-center justify-content-center">
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


    <!-- Membership Owner Header Start-->
    @can('viewOwnerOrStaff', Auth::user())
    <div class="container my-4">
        @can('viewOwner', Auth::user())
        <a class="btn btn-info text-white" href="#">Add Members</a>
        @endcan

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
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @foreach($datas as $d)
                        <tr>
                            <th><img src="{{'/assets/img/user' . asset($d->img)}}" alt=""
                                    style="width: 50px; height: 50px; object-fit: cover;"></th>
                            <th>{{$d->id}}</th>
                            <th>{{$d->name}}</th>
                            <th>{{$d->email}}</th>
                            <th>{{$d->role->name}}</th>
                            @can('viewOwner', Auth::user())
                            <td>
                                <form method="POST" action="{{route('user.destroy', $d->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Delete" class="btn btn-danger"
                                        onclick="return confirm('Are you sure to delete this user?');">
                                </form>
                            </td>
                            @endcan
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- Membership Owner Header End --> 
@endsection
@section('javascript')
@endsection
