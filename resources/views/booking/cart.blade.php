@extends('layouts.frontend')

@section('content')
    <div class="container">
        <h2 class="mb-4">Your Cart</h2>
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Cart Items</div>
                    <div class="card-body">
                        @if (session('cart'))
                            @foreach (session('cart') as $item)
                                <div class="row mb-4">
                                    <div class="col-md-3">
                                        <img src="https://picsum.photos/200" class="img-fluid" alt="Product Name">
                                    </div>
                                    <div class="col-md-6">
                                        <h5>{{ $item['roomName'] }}</h5>
                                        <p>Hotel: {{ $item['hotelName'] }}</p>
                                        <p>Check In at: {{ $item['checkIn'] }}</p>
                                        <p>Check Out at: {{ $item['checkOut'] }}</p>
                                        <p>Days: {{$item['days']}}</p>
                                        <p>Quantity: {{ $item['quantity'] }}</p>
                                    </div>
                                    <div class="col-md-3 text-end">
                                        <p>Price: IDR {{ number_format($item['price'], 2) }}</p>
                                        <p>Total: IDR {{ number_format($item['price'] * $item['days'] * $item['quantity'], 2) }}</p>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#editCartModal">Edit</button>
                                            <button type="button" class="btn btn-danger">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <h5>No item in cart</h5>
                                </div>
                            </div>
                        @endif
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
    <!-- Edit Item Modal -->
    <div class="modal fade" id="editCartModal" tabindex="-1" aria-labelledby="editCartModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editCartModalLabel">Edit Cart Item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @include('booking.editcart')
                </div>
            </div>
        </div>
    </div>
    <!-- End of Edit Item Modal -->
@endsection
