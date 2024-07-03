{{-- Pakai Form Modal --}}
<form method="POST" enctype="multipart/form-data" action="{{ route('user.store') }}">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" id="inputName" aria-describedby="inputName"
            placeholder="Enter Name" value="">

        <label for="email">Email</label>
        <input type="text" class="form-control" name="email" id="inputEmail" aria-describedby="inputEmail"
            placeholder="Enter Email" value="">

        <label for="password">Password</label>
        <input type="password" step="0.01" class="form-control" name="password" id="inputPassword"
            aria-describedby="inputSize" placeholder="Password" value="">

        <label for="passwordConf">Password Confirmation</label>
        <input type="password" step="0.01" class="form-control" name="password_confirmation" id="inputPassword"
            aria-describedby="inputSize" placeholder="Confirm Password" value="">

        <label for="role">Role</label>
        <select name="role" id="role" class="form-control">
            <option value="1">Owner</option>
            <option value="2">Staff</option>
        </select>

        <label for="file_image" class="form-label">Upload Image</label>
        <input type="file" id="file_image" name="file_image"
            class="form-control @error('file_image') is-invalid @enderror">
        @error('file_image')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

    </div>
    <a class="btn btn-info" href="#">Back</a>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>