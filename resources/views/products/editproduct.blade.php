<form method="POST" action="{{ route('products.update', $product->id) }}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="inputName">Name</label>
        <input type="text" class="form-control" name="name" id="inputName" value="{{ $product->name }}">

        <label for="type">Type</label>
        <select name="category" id="type" class="form-control">
            <option value="1" {{ $product->category == 1 ? 'selected' : '' }}>Item</option>
            <option value="0" {{ $product->category == 0 ? 'selected' : '' }}>Facility</option>
        </select>

        {{-- <label for="icon">Icon</label>
        <div class="dropdown">
            <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownIcon"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Select Icon
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownIcon">
                <button class="dropdown-item icon-option {{ $product->icon == 'fa fa-bed' ? 'selected' : '' }}"
                    type="button" data-icon="fa fa-bed"><i class="fa fa-bed"></i> Bed</button>
                <button class="dropdown-item icon-option {{ $product->icon == 'bi bi-wifi' ? 'selected' : '' }}"
                    type="button" data-icon="bi bi-wifi"><i class="bi bi-wifi"></i> Wi-Fi</button>
                <button class="dropdown-item icon-option {{ $product->icon == 'fa fa-utensils' ? 'selected' : '' }}"
                    type="button" data-icon="fa fa-utensils"><i class="fa fa-utensils"></i> Breakfast</button>
                <button class="dropdown-item icon-option {{ $product->icon == 'fa fa-dumbbell' ? 'selected' : '' }}"
                    type="button" data-icon="fa fa-dumbbell"><i class="fa fa-dumbbell"></i> Gym</button>
                <button class="dropdown-item icon-option {{ $product->icon == 'fa fa-shower' ? 'selected' : '' }}"
                    type="button" data-icon="fa fa-shower"><i class="fa fa-shower"></i> Bathroom</button>
                <button
                    class="dropdown-item icon-option {{ $product->icon == 'fa fa-swimming-pool' ? 'selected' : '' }}"
                    type="button" data-icon="fa fa-swimming-pool"><i class="fa fa-swimming-pool"></i> Pool</button>
            </div>
            <input type="hidden" name="icon" id="inputIcon" value="{{ $product->icon }}">
        </div> --}}

        <label for="icon">Icon</label>
        <select name="icon" id="icon" class="form-control">
            <option value="fa fa-bed" {{ $product->icon == 'fa fa-bed' ? 'selected' : '' }}><i class="fa fa-bed"></i>
                Bed</option>
            <option value="bi bi-wifi" {{ $product->icon == 'bi bi-wifi' ? 'selected' : '' }}><i class="bi bi-wifi"></i>
                Wi-Fi</option>
            <option value="fa fa-utensils" {{ $product->icon == 'fa fa-utensils' ? 'selected' : '' }}><i
                    class="fa fa-utensils"></i> Breakfast</option>
            <option value="fa fa-dumbbell" {{ $product->icon == 'fa fa-dumbbell' ? 'selected' : '' }}><i
                    class="fa fa-dumbbell"></i> Gym</option>
            <option value="fa fa-shower" {{ $product->icon == 'fa fa-shower' ? 'selected' : '' }}><i
                    class="fa fa-shower"></i> Bathroom</option>
            <option value="fa fa-swimming-pool" {{ $product->icon == 'fa fa-swimming-pool' ? 'selected' : '' }}><i
                    class="fa fa-swimming-pool"></i> Pool</option>
        </select>

        <label for="inputQty">Quantity</label>
        <input type="text" class="form-control" name="qty" id="inputQty" value="{{ $product->qty }}">
        <input type="hidden" name="rooms_id" id="inputIcon" value="{{ $product->rooms_id }}">

    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
