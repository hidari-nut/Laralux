@extends('layouts.frontend')
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 p-0"
        style="background-image: url({{ asset('assets/img/carousel-1.jpg') }});">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center pb-5">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Trashed Rooms</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Trashed Rooms</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <div class="container my-4">
        {{-- @php
            dd($roomDatas);
        @endphp --}}
        <button onclick="window.location.href='{{ route('roomList', [$roomDatas->hotels_id]) }}'"
            class="btn btn-warning mb-3">View Rooms
            List</button>
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
                    </tr>
                </thead>
                <tbody>
                    @foreach ($trashedRooms as $rooms)
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
                                <button class="btn btn-success" data-toggle="modal" data-target="#restoreRoomModal"
                                    data-room-id="{{ $rooms->id }}"
                                    data-hotel-id="{{ $rooms->hotels_id }}">Restore</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Restore Room Modal -->
    <div class="modal fade" id="restoreRoomModal" tabindex="-1" role="dialog" aria-labelledby="restoreRoomModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" action="{{ route('roomsRestore') }}">
                    @csrf
                    <input type="hidden" name="room_id" id="room_id">
                    <input type="hidden" name="hotel_id" id="hotel_id">
                    <div class="modal-header">
                        <h5 class="modal-title" id="restoreRoomModalLabel">Confirm Restoration</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to restore this room?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Restore</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End of Restore Room Modal -->
@endsection

@section('javascript')
    <script>
        $('#restoreRoomModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var roomId = button.data('room-id');
            var hotelId = button.data('hotel-id');

            var modal = $(this);
            modal.find('#room_id').val(roomId);
            modal.find('#hotel_id').val(hotelId);
        });
    </script>
@endsection
