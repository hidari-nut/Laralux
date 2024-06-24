@extends('layouts.frontend')
@section('content')

  <!-- Page Header Start -->
  <div class="container-fluid page-header mb-5 p-0" style="background-image: url({{asset('assets/img/carousel-1.jpg')}});">
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
            <ul>
                <li>Hotel Product 1</li>
                <li>Hotel Product 2</li>
                <li>Hotel Product 3</li>
            </ul>
        </div>
    </div>
    
    <div class="card">
        <div class="card-header">
            Customers with the Highest Total Purchases
        </div>
        <div class="card-body">
            <ul>
                <li>Customer 1</li>
                <li>Customer 2</li>
                <li>Customer 3</li>
            </ul>
        </div>
    </div>
    
    <div class="card">
        <div class="card-header">
            Customers with the Most Membership Points
        </div>
        <div class="card-body">
            <ul>
                <li>Customer 1</li>
                <li>Customer 2</li>
                <li>Customer 3</li>
            </ul>
        </div>
    </div>
    


@endsection
@section('javascript')
@endsection
