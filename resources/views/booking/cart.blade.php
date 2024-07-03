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
        $taxAmount = 0;
        $pointsDiscount = 0;
        $pointsDeducted = 0;
        $grandTotal = 0;
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
                                    $subtotal += $item['price'] * $item['days'] * $item['quantity'];
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
                                            {{ number_format($item['price'] * $item['days'] * $item['quantity'], 2) }}
                                        </p>
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
                        <p>Subtotal: IDR {{ number_format($subtotal, 2) }}</p>
                        {{-- <p>Total: IDR {{ number_format($subtotal + $subtotal * $tax, 2) }}</p> --}}

                        @if (isset($points_total) && request('use_points') == '1')
                            @php
                                if ($subtotal >= 100000) {
                                    if ($subtotal / 100000 >= $points_total) {
                                        $pointsDeducted = $points_total;
                                        $pointsDiscount = $pointsDeducted * 100000;
                                    } else {
                                        $pointsDeducted = floor($subtotal / 100000);
                                        $pointsDiscount = $pointsDiscount = $pointsDeducted * 100000;
                                    }
                                }

                                $grandTotal = $subtotal - $pointsDiscount;
                            @endphp
                        @else
                            @php
                                $taxAmount = $subtotal * $tax;
                                $grandTotal = $subtotal + $subtotal * $tax;
                            @endphp
                        @endif

                        {{-- @if (session('result'))
                            @php
                                $result = session('result');
                                $taxAmount = $result['taxAmount'];
                                $pointsDiscount = $result['pointsDiscount'];
                                $pointsDeducted = $result['pointsDeducted'];
                                $grandTotal = $result['grandTotal'];
                            @endphp
                        @endif --}}

                        @can('viewMember', Auth::user())
                            <p id="points-discount">Points Discount: IDR {{ number_format($pointsDiscount ?? 0, 2) }}</p>
                            <p id="points-deducted">Points Deducted: {{ $pointsDeducted ?? 0 }}</p>
                        @endcan

                        <p id="tax-amount">Tax Amount: IDR {{ number_format($taxAmount ?? 0, 2) }}</p>
                        <p id="grand-total">Grand Total: IDR {{ number_format($grandTotal ?? 0, 2) }}</p>

                        {{-- <p>Tax: IDR {{ number_format($grandTotal * $tax, 2) }}</p>
                        <p id="grand-total">Grand Total: IDR {{ number_format($grandTotal + $grandTotal * $tax, 2) }}</p> --}}

                        @can('viewMember', Auth::user())
                            <p><br>Points left: {{ $points_total }}</p>

                            @if ($subtotal > 100000)
                                <div class="col-12">
                                    <div class="d-flex align-items-center">
                                        <label for="use-points" class="form-label me-2 mb-0">Use Points?</label>
                                        <div class="form-check form-switch m-0">
                                            <input class="form-check-input" type="checkbox" id="use-points"
                                                onclick="calculateDiscount(this.checked, {{ $subtotal }}, {{ $points_total }})">
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="use_points" id="use_points_hidden" value="0">
                            @endif
                        @endcan

                        <button class="btn btn-primary mt-3" type="button" id="checkOut"
                            onclick="checkOutWithPoints({{ $subtotal }})">Proceed to Checkout</button>
                        <button class="btn btn-primary mt-3" type="button" id="checkOutWithPoints"
                            onclick="checkOutWithPoints({{ $subtotal }})">Proceed to Checkout With Points</button>
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
                    $('#modalContent').html(data.msg);
                    attachEventListeners();
                }
            });
        }

        function checkOutWithPoints(subtotal) {
            $.ajax({
                type: 'POST',
                url: '{{ route('checkOutWithPoints') }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'subtotal': subtotal,
                    'usePoints': $('#use-points').prop('checked'),
                },
                success: function(data) {
                    location.reload();
                }
            })
        }

        $(document).ready(function() {
            $('#points-discount').hide();
            $('#points-deducted').hide();
            $('#checkOut').show();
            $('#checkOutWithPoints').hide();

            $('#use-points').change(function() {
                if ($(this).is(':checked')) {
                    $('#points-discount').show();
                    $('#points-deducted').show();
                    $('#checkOut').hide();
                    $('#checkOutWithPoints').show();
                } else {
                    $('#points-discount').hide();
                    $('#points-deducted').hide();
                    $('#checkOut').show();
                    $('#checkOutWithPoints').hide();
                }
            });
        });

        $(document).ready(function() {
            $('#use-points').change(function() {
                if ($(this).is(':checked')) {
                    // $('#points-discount, #points-deducted, #grand-total').removeClass('hide').addClass(
                    // 'show');

                    $('#points-discount, #points-deducted').removeClass('hide').addClass(
                        'show');
                } else {
                    // $('#points-discount, #points-deducted, #grand-total').removeClass('show').addClass(
                    //     'hide');

                    $('#points-discount, #points-deducted').removeClass('show').addClass(
                        'hide');
                }
            });
        });

        document.getElementById('use-points').addEventListener('change', function() {
            document.getElementById('use_points_hidden').value = this.checked ? '1' : '0';
        });

        function calculateDiscount(usePoints, subtotal, pointsTotal) {
            $.ajax({
                type: 'POST',
                url: '{{ route('calculateDiscount') }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',

                    'usePoints': usePoints,
                    'subtotal': subtotal,
                    'pointsTotal': pointsTotal,
                },
                success: function(data) {
                    // const formatter = new Intl.NumberFormat('en-US');
                    $('#points-discount').text('Points Discount: IDR ' + data.pointsDiscount.toLocaleString(
                        'en-US', {
                            minimumFractionDigits: 2,
                            maximumFractionDigits: 2
                        }));
                    $('#points-deducted').text('Points Deducted: ' + data.pointsDeducted);
                    $('#grand-total').text('Grand Total: IDR ' + data.grandTotal.toLocaleString('en-US', {
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                    }));
                    $('#tax-amount').text('Tax Amount: IDR ' + data.taxAmount.toLocaleString('en-US', {
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                    }));

                    // $('#points-discount').text('Points Discount: IDR ' + data.pointsDiscount.toFixed(2));
                    // $('#points-deducted').text('Points Deducted: ' + data.pointsDeducted);
                    // $('#grand-total').text('Grand Total: IDR ' + data.grandTotal.toFixed(2));
                    // $('#tax-amount').text('Tax Amount: IDR ' + data.taxAmount.toFixed(2));

                    // $('#points-discount').text('Points Discount: IDR ' + formatter.format(pointsDiscount));
                    // $('#points-deducted').text('Points Deducted: ' + pointsDeducted);
                    // $('#grand-total').text('Grand Total: IDR ' + formatter.format(grandTotal));
                    // $('#tax-amount').text('Tax Amount: IDR ' + formatter.format(taxAmount));
                }
            })
        }
    </script>
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
    <script>
        function attachEventListeners() {
            // Adults QTY
            document.getElementById('adults-plus').addEventListener('click', function() {
                let adults = document.getElementById('adults');
                adults.value = parseInt(adults.value) + 1;
            });
            document.getElementById('adults-minus').addEventListener('click', function() {
                let adults = document.getElementById('adults');
                if (adults.value > 0) {
                    adults.value = parseInt(adults.value) - 1;
                }
            });

            // Children QTY
            document.getElementById('children-plus').addEventListener('click', function() {
                let children = document.getElementById('children');
                children.value = parseInt(children.value) + 1;
            });
            document.getElementById('children-minus').addEventListener('click', function() {
                let children = document.getElementById('children');
                if (children.value > 0) {
                    children.value = parseInt(children.value) - 1;
                }
            });

            // Rooms QTY
            document.getElementById('rooms-plus').addEventListener('click', function() {
                let rooms = document.getElementById('rooms');
                rooms.value = parseInt(rooms.value) + 1;
            });
            document.getElementById('rooms-minus').addEventListener('click', function() {
                let rooms = document.getElementById('rooms');
                if (rooms.value > 1) {
                    rooms.value = parseInt(rooms.value) - 1;
                }
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            attachEventListeners();
        });
    </script>
@endsection
