<form method="POST" action="{{ route('products.store',  $products->id) }}">
    @csrf
    <div class="form-group">
        <label for="inputName">Name</label>
        <input type="text" class="form-control" name="name" id="inputName" value="{{ old('name') }}">

        <label for="type">Type</label>
        <select name="category" id="type" class="form-control">
            <option value="1">Item</option>
            <option value="0">Facility</option>
        </select>

        <label for="icon">Icon</label>
        <div class="dropdown">
            <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownIcon"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Select Icon
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownIcon">
                <button class="dropdown-item icon-option" type="button" data-icon="fa fa-bed"><i class="fa fa-bed"></i>
                     Bed</button>
                <button class="dropdown-item icon-option" type="button" data-icon="bi bi-wifi"><i
                        class="bi bi-wifi"></i> Wi-Fi</button>
                <button class="dropdown-item icon-option" type="button" data-icon="fa fa-utensils"><i
                        class="fa fa-utensils"></i> Breakfast</button>
                <button class="dropdown-item icon-option" type="button" data-icon="fa fa-dumbbell"><i
                        class="fa fa-dumbbell"></i> Gym</button>
                <button class="dropdown-item icon-option" type="button" data-icon="fa fa-shower"><i
                        class="fa fa-shower"></i> Bathroom</button>
                <button class="dropdown-item icon-option" type="button" data-icon="fa fa-swimming-pool"><i
                        class="fa fa-swimming-pool"></i> Pool</button>
            </div>
            <input type="hidden" name="icon" id="inputIcon" value="{{ old('icon') }}">
            {{-- <div class="selected-icon mt-2"></div> --}}
        </div>
        <label for="inputQty">Quantity</label>
        <input type="text" class="form-control" name="qty" id="inputQty" value="{{ old('qty') }}">
        <input type="hidden" name="rooms_id" id="inputIcon" value="{{ $products->rooms_id }}">
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
