@extends('layouts.frontend')

@section('content')
    <div class="container">
        <h2 class="mb-4">Your Cart</h2>
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Cart Items</div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-3">
                                <img src="https://picsum.photos/200" class="img-fluid" alt="Product Name">
                            </div>
                            <div class="col-md-6">
                                <h5>Product Name</h5>
                                <p>Product Description</p>
                                <p>Quantity: 1</p>
                            </div>
                            <div class="col-md-3 text-end">
                                <p>Price: $100</p>
                                <p>Total: $100</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Order Summary</div>
                    <div class="card-body">
                        <p>Subtotal: $100</p>
                        <p>Tax: $10</p>
                        <p>Total: $110</p>
                        <div class="col-12">
                            <div class="d-flex align-items-center">
                                <label for="use-points" class="form-label me-2 mb-0">Use Points?</label>
                                <div class="form-check form-switch m-0">
                                    <input class="form-check-input" type="checkbox" id="use-points">
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary mt-3">Proceed to Checkout</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
