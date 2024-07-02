<form method="POST" action="{{ route('rooms.update', $room->id) }}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="inputName">Room Name</label>
        <input type="text" class="form-control" name="name" id="inputName" value="{{ $room->name }}">

        <label for="inputDescription">Description</label>
        <input type="text" class="form-control" name="description" id="inputDescription"
            value="{{ $room->description }}">

        <label for="inputCapacity">Capacity</label>
        <input type="text" class="form-control" name="capacity" id="inputCapacity" value="{{ $room->capacity }}">

        <label for="inputDescription">Price</label>
        <input type="text" class="form-control" name="price" id="inputPrice" value="{{ $room->price }}">
             
        <label for="inputImage">Image Path</label>
        <input type="text" class="form-control" name="image" id="inputImage" value="{{ $room->image }}">

        <label for="inputAvailability">Available Rooms</label>
        <input type="text" class="form-control" name="availability" id="inputAvailability" value="{{ $room->availability }}">

        <label for="type">Type</label>
        <select name="room_types_id" id="type" class="form-control">
            @foreach ($types as $type)
                <option value="{{ $type->id }}" {{ $room->room_types_id == $type->id ? 'selected' : '' }}>
                    {{ $type->name }}
                </option>
            @endforeach
        </select>

         <input type="hidden" class="form-control" name="hotels_id" id="inputHotel" value="{{ $room->hotels_id }}">


        {{-- <label for="inputAvailableRoom">Available Room</label>
        <input type="number" class="form-control" name="available_room" id="inputAvailableRoom"
            value="{{ $hotel->available_room }}"> --}}
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
