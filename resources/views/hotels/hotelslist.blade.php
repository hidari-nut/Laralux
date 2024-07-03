@extends('layouts.frontend')
@section('content')
@can('viewOwnerOrStaff', Auth::user())
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
        <a href="{{ route('hotelTrashed') }}" class="btn btn-danger">View Trashed Hotels</a>
        <a href="{{ route('hotelTypes') }}" class="btn btn-success">View Hotel Types</a>

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
                        <th></th>
                        <th>Rooms</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hotelsDatas as $hotels)
                        <tr>
                            <td><img src="{{ '/assets/img/hotels' . asset($hotels->image) }}" alt="{{ $hotels->image }}"
                                    style="width: 50px; height: 50px; object-fit: cover;"></td>
                            <td>{{ $hotels->id }}</td>
                            <td>{{ $hotels->name }}</td>
                            <td>{{ $hotels->description }}</td>
                            <td>{{ $hotels->address }}</td>
                            <td>{{ $hotels->city->name }}</td>
                            <td>{{ $hotels->types->name }}</td>
                            <td>{{ $hotels->phone_number }}</td>
                            <td>{{ $hotels->email }}</td>
                            <td>
                                <button class="btn btn-warning edit-hotel" onclick="getEditForm({{ $hotels->id }})"
                                    data-toggle="modal" href="#editHotelModal">Edit</button>
                            </td>
                            <td>
                                <button class="btn btn-danger" data-toggle="modal" href="#deleteHotelModal"
                                    data-id="{{ $hotels->id }}">Delete</button>
                            </td>
                            <td>
                                <a href="{{ route('roomList', ['hotel' => $hotels->id]) }}"
                                    class="btn btn-success">Check</a>
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
                    @include('hotels.addhotel', ['cities' => $city, 'types' => $types])
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
                </div>
            </div>
        </div>
    </div>
    <!-- End of Edit Hotel Modal -->

    <!-- Delete Hotel Modal -->
    <div class="modal fade" id="deleteHotelModal" tabindex="-1" role="dialog" aria-labelledby="deleteHotelModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteHotelModalLabel">Confirm Deletion</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this hotel?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End of Delete Hotel Modal -->
@endcan
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
    <script>
        $('#deleteHotelModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var hotelId = button.data('id');
            var modal = $(this);
            modal.find('form').attr('action', '/hotels/' + hotelId);
        });
    </script>
@endsection
