<form method="POST" action="{{ route('hotels.update', $hotel->id) }}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="inputName">Hotel Name</label>
        <input type="text" class="form-control" name="name" id="inputName" value="{{ $hotel->name }}">

        <label for="inputDescription">Description</label>
        <input type="text" class="form-control" name="description" id="inputDescription" value="{{ $hotel->description }}">

        <label for="inputAddress">Address</label>
        <input type="text" class="form-control" name="address" id="inputAddress" value="{{ $hotel->address }}">

        <label for="city">City</label>
        <select name="city_id" id="city" class="form-control">
            @foreach ($cities as $cityInfo)
                <option value="{{ $cityInfo->id }}" {{ $hotel->city_id == $cityInfo->id ? 'selected' : '' }}>
                    {{ $cityInfo->name }}
                </option>
            @endforeach
        </select>

        <label for="type">Type</label>
        <select name="type_id" id="type" class="form-control">
            @foreach ($types as $type)
                <option value="{{ $type->id }}" {{ $hotel->type_id == $type->id ? 'selected' : '' }}>
                    {{ $type->name }}
                </option>
            @endforeach
        </select>

        <label for="inputPhone">Phone</label>
        <input type="text" class="form-control" name="phone" id="inputPhone" value="{{ $hotel->phone }}">

        <label for="inputEmail">Email</label>
        <input type="email" class="form-control" name="email" id="inputEmail" value="{{ $hotel->email }}">

        <label for="inputImagePath">Image Path</label>
        <input type="text" class="form-control" name="image_path" id="inputImagePath" value="{{ $hotel->image }}">

        <label for="inputAvailableRoom">Available Room</label>
        <input type="number" class="form-control" name="available_room" id="inputAvailableRoom" value="{{ $hotel->available_room }}">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
