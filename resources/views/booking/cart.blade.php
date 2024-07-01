@extends('layouts.frontend')

@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            <p>{{ session('status') }}</p>
        </div>
    @endif

    @php
        $subtotal = 0;
        $tax = 0.11;
    @endphp

    <div class="container">
        <h2 class="mb-4">Your Cart</h2>
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Cart Items</div>
                    <div class="card-body">
                        @if (session('cart'))
                            @foreach (session('cart') as $item)
                                @php
                                    $subtotal += ($item['price'] * $item['days'] * $item['quantity']);
                                @endphp
                                <div class="row mb-4">
                                    <div class="col-md-3">
                                        <img src="https://picsum.photos/200" class="img-fluid" alt="Product Name">
                                    </div>
                                    <div class="col-md-6">
                                        <h5>{{ $item['roomName'] }}</h5>
                                        <p>Hotel: {{ $item['hotelName'] }}</p>
                                        <p>Check In at: {{ $item['checkIn'] }}</p>
                                        <p>Check Out at: {{ $item['checkOut'] }}</p>
                                        <p>Days: {{ $item['days'] }}</p>
                                        <p>Quantity: {{ $item['quantity'] }}</p>
                                        <p>Persons: {{ $item['adults'] }} Adults, {{ $item['children'] }} Children</p>
                                    </div>
                                    <div class="col-md-3 text-end">
                                        <p>Price: IDR {{ number_format($item['price'], 2) }}</p>
                                        <p>Total: IDR
                                            {{ number_format($item['price'] * $item['days'] * $item['quantity'], 2) }}</p>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                onclick="getEditForm({{ $item['roomId'] }})"
                                                data-bs-target="#editCartModal">
                                                Edit</button>
                                            <a class="btn btn-danger" type="button"
                                                href="{{ route('deleteFromCart', ['roomId' => $item['roomId']]) }}">Delete</a>
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
                        <p>Subtotal: IDR {{number_format($subtotal, 2)}}</p>
                        <p>Tax: IDR {{number_format($subtotal * $tax, 2)}}</p>
                        <p>Total: IDR {{number_format($subtotal + ($subtotal * $tax),2)}}</p>
                        <div class="col-12">
                            <div class="d-flex align-items-center">
                                <label for="use-points" class="form-label me-2 mb-0">Use Points?</label>
                                <div class="form-check form-switch m-0">
                                    <input class="form-check-input" type="checkbox" id="use-points">
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary mt-3" type="button"
                        onclick="checkOut({{($subtotal + ($subtotal * $tax))}})">Proceed to Checkout</button>
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
                <div class="modal-body" id="modalContent">
                    {{-- @include('booking.editcart') --}}
                </div>
            </div>
        </div>
    </div>
    <!-- End of Edit Item Modal -->
@endsection

@section('javascript')
    <script>
        function getEditForm(roomId) {
            $.ajax({
                type: 'POST',
                url: '{{ route('getEditCartForm') }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'roomId': roomId
                },
                success: function(data) {
                    $('#modalContent').html(data.msg)
                }
            });
        }

        function checkOut(total){
            $.ajax({
                type: 'POST',
                url: '{{ route('booking.store') }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'total': total,
                    // 'roomId': roomId,
                    // 'roomName': 'checkIn': document.getElementById('checkInDate').value,
                    // 'checkOut': document.getElementById('checkOutDate').value,
                    // 'adults': document.getElementById('adults').value,
                    // 'children': document.getElementById('children').value,
                    // 'quantity': document.getElementById('rooms').value,
                },
                success: function(data) {
                    location.reload();
                }
            })
        }
    </script>
@endsection
