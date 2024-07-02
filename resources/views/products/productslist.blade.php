@extends('layouts.frontend')
@section('content')
    <div class="container my-4">
        <button class="btn btn-info text-white" data-toggle="modal" data-target="#addProductModal">Add Products</button>
        <a href="{{ route('productTrashed', [$roomDatas->rooms_id]) }}" class="btn btn-danger">View Trashed Products</a>


        <div class='table-responsive'>
            <table class='table'>
                <thead class="thead-light">
                    <tr>
                        <th>ID</th>
                        <th>Icon</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Quantity</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productsDatas as $products)
                        <tr>
                            <td>{{ $products->id }}</td>
                            <td><i class = "{{ $products->icon }}"></i></td>
                            <td>{{ $products->name }}</td>
                            <td>
                                @if ($products->category == 1)
                                    Item
                                @else
                                    Facility
                                @endif
                            </td>
                            <td>{{ $products->qty }}</td>
                            <td>
                                <button class="btn btn-warning edit-product" onclick="getEditForm({{ $products->id }})"
                                    data-toggle="modal" href="#editProductModal">Edit</button>
                            </td>
                            <td>
                                <button class="btn btn-danger" data-toggle="modal" href="#deleteProductModal"
                                    data-id="{{ $products->id }}">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- Add Product Modal -->
    <div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="addProductModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addProductModalLabel">Add Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @include('products.addproduct')
                </div>
            </div>
        </div>
    </div>
    <!-- End of Add Product Modal -->

    <!-- Edit Product Modal -->
    <div class="modal fade" id="editProductModal" tabindex="-1" role="dialog" aria-labelledby="editProductModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProductModalLabel">Edit Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modalContent">
                </div>
            </div>
        </div>
    </div>
    <!-- End of Edit Product Modal -->
    
    <!-- Delete Product Modal -->
    <div class="modal fade" id="deleteProductModal" tabindex="-1" role="dialog" aria-labelledby="deleteProductModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteProductModalLabel">Confirm Deletion</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this product?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.icon-option', function() {
                var selectedIcon = $(this).data('icon');
                var modal = $(this).closest('.modal');
                modal.find('#inputIcon').val(selectedIcon);
                modal.find('.dropdown-toggle').html($(this).find('i').prop('outerHTML') + ' ' + $(this)
                    .text());
            });
            $('#addProductModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var modal = $(this);
            });
            $('#editProductModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var modal = $(this);
            });
        });
    </script>
    <script>
        function getEditForm(id) {
            $.ajax({
                type: 'POST',
                url: '{{ route('productGetEditForm') }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'id': id
                },
                success: function(data) {
                    $('#modalContent').html(data.msg);
                    var selectedIcon = $('#modalContent #inputIcon').val();
                    var selectedIconText = $('#modalContent .icon-option[data-icon="' + selectedIcon + '"]')
                        .text();
                    $('#modalContent .dropdown-toggle').html('<i class="' + selectedIcon + '"></i> ' +
                        selectedIconText);
                }
            });
        }
    </script>
    <script>
        $('#deleteProductModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var productId = button.data('id');
            var modal = $(this);
            modal.find('form').attr('action', '/products/' + productId);
        });
    </script>
@endsection
