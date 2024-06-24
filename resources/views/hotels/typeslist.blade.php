@extends('layouts.frontend')
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 p-0"
        style="background-image: url({{ asset('assets/img/carousel-1.jpg') }});">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center pb-5">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Hotel Types Management</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Hotel</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Hotel Type</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <div class="container my-4">
        <a class="btn btn-info text-white" href="#">Add Type</a>
        <a class="btn btn-warning text-white" data-toggle="modal" href="#">Disclaimer</a>

        <div class='table-responsive'>
            <table class='table'>
                <thead class="thead-light">
                    <tr>
                        <th>ID Type</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>0001</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><a class="btn btn-warning" href="#">Edit</a></td> 
                        <td>
                            <form method="POST" action="#">
                                <input type="submit" value="Delete" class="btn btn-danger"
                                    onclick="return confirm('Are you sure to delete Product A?');">
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('javascript')
@endsection
