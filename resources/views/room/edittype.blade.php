<form method="POST" action="{{ route('roomtypes.update', $type->id) }}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="inputName">Name</label>
        <input type="text" class="form-control" name="name" id="inputName" value="{{ $type->name }}">
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
