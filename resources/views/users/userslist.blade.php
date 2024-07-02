@extends('layouts.frontend')
@section('content')
<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 p-0"
    style="background-image: url({{ asset('assets/img/carousel-1.jpg') }});">
    <div class="container-fluid page-header-inner py-5">
        <div class="container text-center pb-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">User Management</h1>
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
    <button class="btn btn-info text-white" data-toggle="modal" data-target="#addAdminModal" onclick='getAddForm()'>Add Admin</button>
    <div class='table-responsive'>
        <table class='table'>
            <thead class="thead-light">
                <tr>
                    <th></th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Roles</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($datas as $d)
                    <tr>
                        <td><img src="{{'/assets/img/user' . asset($d->img)}}" alt=""
                                style="width: 50px; height: 50px; object-fit: cover;"></td>
                        <td>{{$d->id}}</td>
                        <td>{{$d->name}}</td>
                        <td>{{$d->email}}</td>
                        <td>{{$d->role->name}}</td>
                        <td>
                            <button class="btn btn-warning edit-user" data-toggle="modal" href="#editUserModal"
                                onclick='getEditForm({{$d->id}})'>Edit</button>
                        </td>
                        <td>
                            <form method="POST" action="{{route('user.destroy', $d->id)}}">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Delete" class="btn btn-danger"
                                    onclick="return confirm('Are you sure to delete this user?');">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Add Hotel Modal -->
<div class="modal fade" id="addAdminModal" tabindex="-1" role="dialog" aria-labelledby="addHotelModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addAdminModalLabel">Add Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modalContentAdd">
            </div>
        </div>
    </div>
</div>
<!-- End of Add Hotel Modal -->

<!-- Edit Hotel Modal -->
<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
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
@endsection
@section('javascript')
<script>
    function getEditForm(id) {
        $.ajax({
            type: 'POST',
            url: '{{route("user.getEditForm")}}',
            data: {
                '_token': '<?php echo csrf_token()?>',
                'id': id

            },
            success: function (data) {
                $('#modalContent').html(data.msg)
            }
        });
    }

    function getAddForm() {
        $.ajax({
            type: 'POST',
            url: '{{route("user.getAddForm")}}',
            data: {
                '_token': '<?php echo csrf_token()?>',

            },
            success: function (data) {
                $('#modalContentAdd').html(data.msg)
            }
        });
    }
</script>
@endsection