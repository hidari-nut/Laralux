@extends('layouts.frontend')
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 p-0"
        style="background-image: url({{ asset('assets/img/carousel-1.jpg') }});">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center pb-5">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Type Management</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Room</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Type</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <div class="container my-4">
        <button class="btn btn-info text-white" data-toggle="modal" data-target="#addroomTypeModal">Add Room</button>
        <a href="{{ route('roomTypesTrashed') }}" class="btn btn-danger">View Trashed Rooms</a>


        <div class='table-responsive'>
            <table class='table'>
                <thead class="thead-light">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roomTypesDatas as $roomTypes)
                        <tr>
                            <td>{{ $roomTypes->id }}</td>
                            <td>{{ $roomTypes->name }}</td>
                            <td>
                                <button class="btn btn-warning edit-roomType" onclick="getEditForm({{ $roomTypes->id }})"
                                    data-toggle="modal" href="#editroomTypeModal">Edit</button>
                            </td>
                            <td>
                                <button class="btn btn-danger" data-toggle="modal" href="#deleteroomTypeModal"
                                    data-id="{{ $roomTypes->id }}">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Add Type Modal -->
    <div class="modal fade" id="addroomTypeModal" tabindex="-1" role="dialog" aria-labelledby="addroomTypeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addroomTypeModalLabel">Add roomType</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @include('room.addtype')
                </div>

            </div>
        </div>
    </div>
    <!-- End of Add Type Modal -->

    <!-- Edit Type Modal -->
    <div class="modal fade" id="editroomTypeModal" tabindex="-1" role="dialog" aria-labelledby="editroomTypeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editroomTypeModalLabel">Edit Room</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modalContent">
                </div>
            </div>
        </div>
    </div>
    <!-- End of Edit Type Modal -->

    <!-- Delete Type Modal -->
    <div class="modal fade" id="deleteroomTypeModal" tabindex="-1" role="dialog" aria-labelledby="deleteroomTypeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteroomTypeModalLabel">Confirm Deletion</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this roomType?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End of Delete Type Modal -->
@endsection
@section('javascript')
    <script>
        $(document).ready(function() {
            $('#addroomTypeModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var modal = $(this);
            });
        });
    </script>
    <script>
        function getEditForm(id) {
            $.ajax({
                type: 'POST',
                url: '{{ route('roomTypesGetEditForm') }}',
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
        $('#deleteroomTypeModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var roomTypeId = button.data('id');
            var modal = $(this);
            modal.find('form').attr('action', '/roomtypes/' + roomTypeId);
        });
    </script>
@endsection
