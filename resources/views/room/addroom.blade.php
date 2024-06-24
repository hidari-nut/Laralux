<form method="POST" action="#">
    <div class="form-group">
        <label for="inputName">Product Name</label>
        <input type="text" class="form-control" name="name" id="inputName" aria-describedby="inputName"
            placeholder="Enter your Product Name" value="">

        <label for="inputPrice">Price</label>
        <input type="number" class="form-control" name="price" id="inputPrice" aria-describedby="inputPrice"
            placeholder="Enter the Price" value="">

        <label for="inputSize">Size</label>
        <input type="number" step="0.01" class="form-control" name="size" id="inputSize"
            aria-describedby="inputSize" placeholder="Enter the Size" value="">

        <label for="inputCapacity">Capacity</label>
        <input type="number" class="form-control" name="capacity" id="inputCapacity" aria-describedby="inputCapacity"
            placeholder="Enter the Capacity" value="">

        <label for="hotel">Hotel</label>
        <select name="hotel" id="hotel" class="form-control">
            <option value="1">Hotel One</option>
            <option value="2">Hotel Two</option>
            <option value="3">Hotel Three</option>
        </select>

        <label for="inputImagePath">Image Path</label>
        <input type="text" class="form-control" name="image_path" id="inputImagePath"
            aria-describedby="inputImagePath" placeholder="Enter the Image Path" value="">

        <label for="inputAvailableRoom">Available Room</label>
        <input type="number" class="form-control" name="available_room" id="inputAvailableRoom"
            aria-describedby="inputAvailableRoom" placeholder="Enter the Available Room" value="">
    </div>
    <a class="btn btn-info" href="#">Back</a>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
