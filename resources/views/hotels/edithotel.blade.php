<form method="POST" enctype="multipart/form-data" action="{{ route('hotels.update', $hotel->id) }}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="inputName">Hotel Name</label>
        <input type="text" class="form-control" name="name" id="inputName" value="{{ $hotel->name }}">

        <label for="inputDescription">Description</label>
        <input type="text" class="form-control" name="description" id="inputDescription"
            value="{{ $hotel->description }}">

        <label for="inputAddress">Address</label>
        <input type="text" class="form-control" name="address" id="inputAddress" value="{{ $hotel->address }}">

        <label for="city">City</label>
        <select name="citys_id" id="city" class="form-control">
            @foreach ($cities as $cityInfo)
                <option value="{{ $cityInfo->id }}" {{ $cityInfo->id == $hotel->citys_id ? 'selected' : '' }}>
                    {{ $cityInfo->name }}
                </option>
            @endforeach
        </select>

        <label for="type">Type</label>
        <select name="hotel_types_id" id="type" class="form-control">
            @foreach ($types as $type)
                <option value="{{ $type->id }}" {{ $hotel->hotel_types_id == $type->id ? 'selected' : '' }}>
                    {{ $type->name }}
                </option>
            @endforeach
        </select>

        <label for="inputPhone">Phone</label>
        <input type="text" class="form-control" name="phone_number" id="inputPhone"
            value="{{ $hotel->phone_number }}">

        <label for="inputEmail">Email</label>
        <input type="email" class="form-control" name="email" id="inputEmail" value="{{ $hotel->email }}">

        <label for="inputImagePath" class="form-label">Upload Image</label>
        <input type="file" id="inputImagePath" name="image_path"
            class="form-control @error('file_image') is-invalid @enderror">
        @error('file_image')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        {{-- <label for="inputAvailableRoom">Available Room</label>
        <input type="number" class="form-control" name="available_room" id="inputAvailableRoom"
            value="{{ $hotel->available_room }}"> --}}
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
