<div class="bg-light mb-5 wow fadeInDown" data-wow-delay="0.1s">
    <form method="POST" action="{{ route('addToCart') }}">
        @csrf
        <div class="border-bottom text-center text-dark p-3 pt-4 mb-3">
            <span class="align-top fs-4 lh-base">IDR</span>
            <span class="align-middle fs-1 lh-sm fw-bold">{{ $room->price }}</span>
            <span class="align-bottom fs-6 lh-lg">/ Night</span>
        </div>
        <div class="row g-3 p-4 pt-2">
            <div class="col-12">
                <div class="input-group date" id="checkInDate" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#checkInDate"
                        id="checkInDate" name="checkInDate" value="{{ $item['checkIn'] }}" />
                    <div class="input-group-append" data-target="#checkInDate" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="input-group date" id="checkOutDate" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#checkOutDate"
                        id="checkOutDate" name="checkOutDate" value="{{ $item['checkOut'] }}" />
                    <div class="input-group-append" data-target="#checkOutDate" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <label for="adults" class="form-label">Adults</label>
                <div class="input-group">
                    <button type="button" class="btn btn-outline-secondary" id="adults-minus">-</button>
                    <input type="text" class="form-control text-center" id="adults" value="{{ $item['adults'] }}"
                        name="adults" readonly>
                    <button type="button" class="btn btn-outline-secondary" id="adults-plus">+</button>
                </div>
            </div>
            <div class="col-12">
                <label for="children" class="form-label">Children</label>
                <div class="input-group">
                    <button type="button" class="btn btn-outline-secondary" id="children-minus">-</button>
                    <input type="text" class="form-control text-center" id="children" name="children"
                        value="{{ $item['children'] }}" readonly>
                    <button type="button" class="btn btn-outline-secondary" id="children-plus">+</button>
                </div>
            </div>
            <div class="col-12">
                <label for="rooms" class="form-label">Rooms</label>
                <div class="input-group">
                    <button type="button" class="btn btn-outline-secondary" id="rooms-minus">-</button>
                    <input type="text" class="form-control text-center" id="rooms" name="rooms"
                        value="{{ $item['quantity'] }}" readonly>
                    <button type="button" class="btn btn-outline-secondary" id="rooms-plus">+</button>
                </div>
            </div>
        </div>
        <input type="hidden" id="roomId" name="roomId" value={{ $room->id }}>
        <input type="hidden" id="price" name="price" value={{ $room->price }}>
        <div class="col-12">
            <button type="submit" class="btn btn-primary py-3 w-100">
                Edit Item</button>
        </div>
    </form>
</div>


<script>
    $(function() {
        $('#checkInDate').datetimepicker({
            locale: 'id'
        });
        $('#checkOutDate').datetimepicker({
            locale: 'id'
        });
    });
</script>
