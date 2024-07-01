{{-- Pakai Form Modal --}}
<form method="POST" action="#">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" id="inputName" aria-describedby="inputName"
            placeholder="Enter Name" value="">

        <label for="email">Email</label>
        <input type="text" class="form-control" name="inputEmail" id="inputEmail" aria-describedby="inputEmail"
            placeholder="Enter Email" value="">

        <label for="password">Password</label>
        <input type="password" step="0.01" class="form-control" name="password" id="inputPassword"
            aria-describedby="inputSize" placeholder="Password" value="">

        <label for="passwordConf">Password Confirmation</label>
        <input type="password" step="0.01" class="form-control" name="passwordConf" id="inputPassword"
            aria-describedby="inputSize" placeholder="Confirm Password" value="">

        <label for="role">Role</label>
        <select name="role" id="role" class="form-control">
            <option value="1">Role One</option>
            <option value="2">Role Two</option>
        </select>

        <label for="inputImagePath">Image</label>
        <input type="text" class="form-control" name="image_path" id="inputImagePath"
            aria-describedby="inputImagePath" placeholder="Enter the Image Path" value="">

    </div>
    <a class="btn btn-info" href="#">Back</a>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
