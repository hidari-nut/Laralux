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
        <button onclick="window.location.href='{{ route('roomTypes') }}'" class="btn btn-warning mb-3">View Types List</button>
        <div class='table-responsive'>
            <table class='table'>
                <thead class="thead-light">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($trashedTypes  as $roomTypes)
                        <tr>
                            <td>{{ $roomTypes->id }}</td>
                            <td>{{ $roomTypes->name }}</td>
                            <td>
                                <button class="btn btn-success" data-toggle="modal" data-target="#restoreTypeModal" data-id="{{ $roomTypes->id }}">Restore</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Restore Room Modal -->
    <div class="modal fade" id="restoreTypeModal" tabindex="-1" role="dialog" aria-labelledby="restoreTypeModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" action="{{ route('roomTypesRestore') }}">
                    @csrf
                    <input type="hidden" name="type_id" id="type_id">
                    <div class="modal-header">
                        <h5 class="modal-title" id="restoreTypeModalLabel">Confirm Restoration</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to restore this room type?
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
        $('#restoreTypeModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var typeId = button.data('id');
            var modal = $(this);
            modal.find('#type_id').val(typeId);
        });
    </script>
@endsection
