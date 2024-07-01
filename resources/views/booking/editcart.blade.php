<div class="bg-light mb-5">
    <div class="border-bottom text-center text-dark p-3 pt-4 mb-3">
        <span class="align-top fs-4 lh-base">IDR</span>
        <span class="align-middle fs-1 lh-sm fw-bold">Price</span>
        <span class="align-bottom fs-6 lh-lg">/ Night</span>
    </div>
    <div class="row g-3 p-4 pt-2">
        <div class="col-12">
            <div class="date" id="date3" data-target-input="nearest">
                <input type="text" class="form-control datetimepicker-input" placeholder="Check in"
                    data-target="#date3" data-toggle="datetimepicker" />
            </div>
        </div>
        <div class="col-12">
            <div class="date" id="date4" data-target-input="nearest">
                <input type="text" class="form-control datetimepicker-input" placeholder="Check out"
                    data-target="#date4" data-toggle="datetimepicker" />
            </div>
        </div>
        <div class="col-12">
            <label for="adults" class="form-label">Adults</label>
            <div class="input-group">
                <button type="button" class="btn btn-outline-secondary" id="adults-minus">-</button>
                <input type="text" class="form-control text-center" id="adults" value="0" readonly>
                <button type="button" class="btn btn-outline-secondary" id="adults-plus">+</button>
            </div>
        </div>
        <div class="col-12">
            <label for="children" class="form-label">Children</label>
            <div class="input-group">
                <button type="button" class="btn btn-outline-secondary" id="children-minus">-</button>
                <input type="text" class="form-control text-center" id="children" value="0" readonly>
                <button type="button" class="btn btn-outline-secondary" id="children-plus">+</button>
            </div>
        </div>
        <div class="col-12">
            <label for="rooms" class="form-label">Rooms</label>
            <div class="input-group">
                <button type="button" class="btn btn-outline-secondary" id="rooms-minus">-</button>
                <input type="text" class="form-control text-center" id="rooms" value="1" readonly>
                <button type="button" class="btn btn-outline-secondary" id="rooms-plus">+</button>
            </div>
        </div>
    </div>
    <div class="col-12">
        <button class="btn btn-primary py-3 w-100">Submit</button>
    </div>
</div>
