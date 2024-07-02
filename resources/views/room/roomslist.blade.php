@extends('layouts.frontend')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 p-0"
        style="background-image: url({{ asset('assets/img/carousel-1.jpg') }});">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center pb-5">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Room Management</h1>
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
        <button class="btn btn-info text-white" data-toggle="modal" data-target="#addRoomModal">Add Room</button>
        <a href="{{ route('roomTrashed', [$hotelDatas->hotels_id]) }}" class="btn btn-danger">View Trashed
            Rooms</a>


        <div class='table-responsive'>
            <table class='table'>
                <thead class="thead-light">
                    <tr>
                        <th></th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Capacity</th>
                        <th>Type</th>
                        <th>Available</th>
                        <th>Action</th>
                        <th></th>
                        <th>Products</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roomsDatas as $rooms)
                        <tr>
                            <td img src="{{ $rooms->image }}" alt="{{ $rooms->image }}">{{ $rooms->image }}</td>
                            <td>{{ $rooms->id }}</td>
                            <td>{{ $rooms->name }}</td>
                            <td>{{ $rooms->description }}</td>
                            <td>{{ $rooms->price }}</td>
                            <td>{{ $rooms->capacity }}</td>
                            <td>{{ $rooms->roomType->name }}</td>
                            <td>{{ $rooms->availability }}</td>
                            <td>
                                <button class="btn btn-warning edit-room" onclick="getEditForm({{ $rooms->id }})"
                                    data-toggle="modal" href="#editRoomModal">Edit</button>
                            </td>
                            <td>
                                <button class="btn btn-danger" data-toggle="modal" href="#deleteRoomModal"
                                    data-id="{{ $rooms->id }}">Delete</button>
                            </td>
                            <td>
                                {{-- <button class="btn btn-success" data-toggle="modal" href="#">Check</button> --}}
                                <a class="btn btn-success" 
                                    href="{{ route('productList', [$rooms->hotels_id, $rooms->id]) }}">Check</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Add Hotel Modal -->
    <div class="modal fade" id="addRoomModal" tabindex="-1" role="dialog" aria-labelledby="addRoomModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addRoomModalLabel">Add Hotel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @include('room.addroom', ['types' => $types])
                </div>

            </div>
        </div>
    </div>
    <!-- End of Add Hotel Modal -->

    <!-- Edit Room Modal -->
    <div class="modal fade" id="editRoomModal" tabindex="-1" role="dialog" aria-labelledby="editRoomModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editRoomModalLabel">Edit Room</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modalContent">

                </div>
            </div>
        </div>
    </div>
    <!-- End of Edit Room Modal -->

    <!-- Delete Hotel Modal -->
    <div class="modal fade" id="deleteRoomModal" tabindex="-1" role="dialog" aria-labelledby="deleteRoomModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteRoomModalLabel">Confirm Deletion</h5>
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
@endsection

@section('javascript')
    <script>
        $(document).ready(function() {
            $('#addRoomModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var modal = $(this);
            });
        });
    </script>
    <script>
        function getEditForm(id) {
            $.ajax({
                type: 'POST',
                url: '{{ route('roomGetEditForm') }}',
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
        $('#deleteRoomModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var hotelId = button.data('id');
            var modal = $(this);
            modal.find('form').attr('action', '/rooms/' + hotelId);
        });
    </script>
@endsection
