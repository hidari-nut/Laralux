{{-- Pakai Form Modal --}}
<form method="POST" enctype="multipart/form-data" action="{{route('user.updateStaff', $data->id)}}">
    @csrf
    @method("PUT")
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" id="inputName" aria-describedby="inputName"
            placeholder="Enter Name" value="{{$data->name}}">

        <label for="role">Role</label>
        @if ($data->roles_id == 1||$data->roles_id == 2)
            <select name="role" id="role" class="form-control">
                <option @if ($data->roles_id == 1) selected @endif value="1">Owner</option>
                <option @if ($data->roles_id == 2) selected @endif value="2">Staff</option>
            </select>
        @endif

        <label for="file_image" class="form-label">Upload Image</label>
        <input type="file" id="file_image" name="file_image" class="form-control @error('file_image') is-invalid @enderror">
        @error('file_image')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

    </div>
    <a class="btn btn-info" href="{{url()->previous()}}">Back</a>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>