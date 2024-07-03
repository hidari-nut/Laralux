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
                        <li class="breadcrumb-item"><a href="#">Hotel</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Type</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <div class="container my-4">
        <a href="{{ route('hotelList') }}" class="btn btn-warning">Return to Hotels List</a>
        <button class="btn btn-info text-white" data-toggle="modal" data-target="#addhotelTypeModal">Add Hotel Type</button>
        <a href="{{ route('hotelTypesTrashed') }}" class="btn btn-danger">View Trashed Hotel Types</a>


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
                    @foreach ($hotelTypesDatas as $hotelTypes)
                        <tr>
                            <td>{{ $hotelTypes->id }}</td>
                            <td>{{ $hotelTypes->name }}</td>
                            <td>
                                <button class="btn btn-warning edit-hotelType" onclick="getEditForm({{ $hotelTypes->id }})"
                                    data-toggle="modal" href="#edithotelTypeModal">Edit</button>
                            </td>
                            <td>
                                <button class="btn btn-danger" data-toggle="modal" href="#deletehotelTypeModal"
                                    data-id="{{ $hotelTypes->id }}">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Add Type Modal -->
    <div class="modal fade" id="addhotelTypeModal" tabindex="-1" role="dialog" aria-labelledby="addhotelTypeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addhotelTypeModalLabel">Add hotelType</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @include('hotels.addtype')
                </div>

            </div>
        </div>
    </div>
    <!-- End of Add Type Modal -->

    <!-- Edit Type Modal -->
    <div class="modal fade" id="edithotelTypeModal" tabindex="-1" role="dialog" aria-labelledby="edithotelTypeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edithotelTypeModalLabel">Edit Hotel</h5>
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
    <div class="modal fade" id="deletehotelTypeModal" tabindex="-1" role="dialog" aria-labelledby="deletehotelTypeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header">
                        <h5 class="modal-title" id="deletehotelTypeModalLabel">Confirm Deletion</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this hotelType?
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
            $('#addhotelTypeModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var modal = $(this);
            });
        });
    </script>
    <script>
        function getEditForm(id) {
            $.ajax({
                type: 'POST',
                url: '{{ route('hotelTypesGetEditForm') }}',
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
        $('#deletehotelTypeModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var hotelTypeId = button.data('id');
            var modal = $(this);
            modal.find('form').attr('action', '/hoteltypes/' + hotelTypeId);
        });
    </script>
@endsection
