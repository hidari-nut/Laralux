@extends('layouts.frontend')
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 p-0"
        style="background-image: url({{ asset('assets/img/carousel-1.jpg') }});">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center pb-5">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Hotel Management</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Hotel</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <div class="container my-4">
        <button class="btn btn-info text-white" data-toggle="modal" data-target="#addHotelModal">Add Hotel</button>


        <div class='table-responsive'>
            <table class='table'>
                <thead class="thead-light">
                    <tr>
                        <th></th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>Type</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hotelsDatas as $hotels)
                        <tr>
                            <th img src="{{ $hotels->image }}" alt="{{ $hotels->image }}"></th>
                            <th>{{ $hotels->id }}</th>
                            <th>{{ $hotels->name }}</th>
                            <th>{{ $hotels->description }}</th>
                            <th>{{ $hotels->address }}</th>
                            <th>{{ $hotels->city->name }}</th>
                            <th>{{ $hotels->types->name }}</th>
                            <th>{{ $hotels->phone_number }}</th>
                            <th>{{ $hotels->email }}</th>
                            <td>
                                <button class="btn btn-warning edit-hotel" onclick="getEditForm({{ $hotels->id }})"
                                    data-toggle="modal" href="#editHotelModal">Edit</button>
                            </td>
                            <td>
                                <form method="POST" action="#">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Delete" class="btn btn-danger"
                                        onclick="return confirm('Are you sure to delete this hotel?');">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Add Hotel Modal -->
    <div class="modal fade" id="addHotelModal" tabindex="-1" role="dialog" aria-labelledby="addHotelModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addHotelModalLabel">Add Hotel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @include('hotels.addhotel')
                </div>

            </div>
        </div>
    </div>
    <!-- End of Add Hotel Modal -->

    <!-- Edit Hotel Modal -->
    <div class="modal fade" id="editHotelModal" tabindex="-1" role="dialog" aria-labelledby="editHotelModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editHotelModalLabel">Edit Hotel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modalContent">
                    {{-- @include('hotels.edithotel') --}}
                </div>
            </div>
        </div>
    </div>
    <!-- End of Edit Hotel Modal -->
@endsection
@section('javascript')
    <script>
        $(document).ready(function() {
            $('#addHotelModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var modal = $(this);
            });
        });
    </script>
    <script>
        function getEditForm(id) {
            $.ajax({
                type: 'POST',
                url: '{{ route('hotelsGetEditForm') }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'id': id
                },
                success: function(data) {
                    $('#modalContent').html(data.msg)
                }
            });
        }
    </script>
@endsection
