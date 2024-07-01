<form method="POST" action="{{ route('products.store') }}">
    @csrf
    <div class="form-group">
        <label for="inputDescription">Name</label>
        <input type="text" class="form-control" name="name" id="inputName" value="{{ old('name') }}">
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
