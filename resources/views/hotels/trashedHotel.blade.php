@extends('layouts.frontend')
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 p-0"
        style="background-image: url({{ asset('assets/img/carousel-1.jpg') }});">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center pb-5">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Trashed Hotels</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Trashed Hotels</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <div class="container my-4">
        <button onclick="window.location.href='{{ route('hotelList') }}'" class="btn btn-warning mb-3">View Hotels List</button>
        <div class='table-responsive'>
            <table class='table'>
                <thead class="thead-light">
                    <tr>
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
                    @foreach ($trashedHotels as $hotel)
                        <tr>
                            <th>{{ $hotel->id }}</th>
                            <th>{{ $hotel->name }}</th>
                            <th>{{ $hotel->description }}</th>
                            <th>{{ $hotel->address }}</th>
                            <th>{{ $hotel->city->name }}</th>
                            <th>{{ $hotel->types->name }}</th>
                            <th>{{ $hotel->phone_number }}</th>
                            <th>{{ $hotel->email }}</th>
                            <td>
                                <button class="btn btn-success" data-toggle="modal" data-target="#restoreHotelModal" data-id="{{ $hotel->id }}">Restore</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Restore Hotel Modal -->
    <div class="modal fade" id="restoreHotelModal" tabindex="-1" role="dialog" aria-labelledby="restoreHotelModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" action="{{ route('hotelsRestore') }}">
                    @csrf
                    <input type="hidden" name="hotel_id" id="hotel_id">
                    <div class="modal-header">
                        <h5 class="modal-title" id="restoreHotelModalLabel">Confirm Restoration</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to restore this hotel?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Restore</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End of Restore Hotel Modal -->
@endsection

@section('javascript')
    <script>
        $('#restoreHotelModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var hotelId = button.data('id');
            var modal = $(this);
            modal.find('#hotel_id').val(hotelId);
        });
    </script>
@endsection
