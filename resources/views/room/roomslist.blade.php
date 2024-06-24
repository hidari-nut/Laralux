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
        <a class="btn btn-info text-white" href="#">Add Room</a>
        <a class="btn btn-warning text-white" data-toggle="modal" href="#">Disclaimer</a>

        <div class='table-responsive'>
            <table class='table'>
                <thead class="thead-light">
                    <tr>
                        <th>ID Room</th>
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
                        <td><a class="btn btn-warning" href="#" data-toggle="modal" data-target="#editRoomModal">Edit</a></td> 
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

    <div class="modal fade" id="editRoomModal" tabindex="-1" role="dialog" aria-labelledby="editRoomModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editRoomModalLabel">Edit Room</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @include('room.editroom')
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#editRoomModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget); 
                var roomId = button.closest('tr').find('td:first').text(); 

                var modal = $(this);
                modal.find('.modal-body #inputName').val('Room Name');
                modal.find('.modal-body #inputPrice').val('100');
                modal.find('.modal-body #inputSize').val('30.5');
                modal.find('.modal-body #inputCapacity').val('3');
                modal.find('.modal-body #hotel').val('1');
                modal.find('.modal-body #inputImagePath').val('path/to/image.jpg');
                modal.find('.modal-body #inputAvailableRoom').val('5');
            });
        });
    </script>
@endsection
