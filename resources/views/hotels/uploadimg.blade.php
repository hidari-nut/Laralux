<div class="container">
    <form method="POST" enctype="multipart/form-data" action="#">
        @csrf
        <div class="form-group">
            <label for="exampleInputType">Pilih Image</label>
            <input type="file" class="form-control" name="file_image" />
            <input type="hidden" name='product_id' value="#" />
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
