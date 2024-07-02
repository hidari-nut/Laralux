@extends('layouts.frontend')
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 p-0"
        style="background-image: url({{ asset('assets/img/carousel-1.jpg') }});">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center pb-5">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Product Management</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Hotel</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Product</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <div class="container my-4">
        <button onclick="window.location.href='{{ route('productList') }}'" class="btn btn-warning mb-3">View Products List</button>
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
                    @foreach ($trashedProducts as $products)
                        <tr>
                            <td>{{ $products->id }}</td>
                            <td><i class = "{{$products->icon}}"></i></td>
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

    <!-- Restore ProductModal -->
    <div class="modal fade" id="restoreProductModal" tabindex="-1" role="dialog" aria-labelledby="restoreProductModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" action="{{ route('productRestore') }}">
                    @csrf
                    <input type="hidden" name="product_id" id="product_id">
                    <div class="modal-header">
                        <h5 class="modal-title" id="restoreProductModalLabel">Confirm Restoration</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to restore this product?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Restore</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End of Restore ProductModal -->
@endsection

@section('javascript')
    <script>
        $('#restoreProductModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var productId = button.data('id');
            var modal = $(this);
            modal.find('#product_id').val(productId);
        });
    </script>
@endsection
