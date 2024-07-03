<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\BookingDetail;
use App\Models\Point;
use App\Models\Room;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    public function transactionsList()
    {
        $user = Auth::user();
        $this->authorize('showMembers-permission', $user);
        $bookings = Booking::all();
        return view('booking.transaction', compact('bookings'));
    }

    public function checkMemberBookings(Request $request)
    {
        $bookings = Booking::where('users_id', '=', $request->user_id)
            ->with('bookingDetails')
            ->get();

        $points = Point::all()->where('users_id', '=', $request->user_id);

        $points_total = 0;

        foreach ($points as $point) {
            $points_total += $point->points;
        }
        return view('membership.index', compact('bookings', 'points', 'points_total'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function calculateDiscount(Request $request)
    {
        $usePoints = $request->get('usePoints');
        $subtotal = $request->get('subtotal');
        $pointsTotal = $request->get('pointsTotal');

        // dd($usePoints);

        $tax = 0.11;
        $pointsDiscount = 0;
        $pointsDeducted = 0;
        $grandTotal = 0;

        if ($usePoints == 'true') {
            $grandTotal = $subtotal + $subtotal * $tax;
            if ($subtotal >= 100000) {
                if ($grandTotal / 100000 >= $pointsTotal) {
                    $pointsDeducted = $pointsTotal;
                    $pointsDiscount = $pointsDeducted * 100000;
                } else {
                    $pointsDeducted = floor($grandTotal / 100000);
                    $pointsDiscount = $pointsDeducted * 100000;
                }
            }
            $grandTotal = $grandTotal - $pointsDiscount;
        } else {
            $grandTotal = $subtotal + $subtotal * $tax;
        }

        $result = [
            'taxAmount' => $subtotal * $tax,
            'grandTotal' => $grandTotal,
            'pointsDiscount' => $pointsDiscount,
            'pointsDeducted' => $pointsDeducted,
        ];

        return response()->json($result);
    }

    public function checkOutWithPoints(Request $request)
    {
        //Id for Deluxe, Superior, and Suite rooms
        $specialRoomsId = [2, 3, 4];
        $totalPointsGained = 0;

        $tax = 0.11;
        $pointsDiscount = 0;
        $pointsDeducted = 0;
        $grandTotal = 0;

        if (session('cart')) {
            $points  = Point::where('users_id', '=', Auth::id())->get();
    
            $pointsTotal = 0;
    
            foreach ($points as $point) {
                $pointsTotal += $point->points;
            }

            $request->validate([
                'subtotal' => 'required',
                'usePoints' => 'required',
            ]);

            $subtotal = (int)$request->get('subtotal');
            $usePoints = $request->get('usePoints');

            if ($usePoints == 'true') {
                $grandTotal = $subtotal + $subtotal * $tax;
                if ($subtotal >= 100000) {
                    if (($grandTotal / 100000) >= $pointsTotal) {
                        $pointsDeducted = $pointsTotal;
                        $pointsDiscount = $pointsDeducted * 100000;
                    } else {
                        $pointsDeducted = floor($grandTotal / 100000);
                        $pointsDiscount = $pointsDeducted * 100000;
                    }
                }
                $grandTotal = $grandTotal - $pointsDiscount;
            } else {
                $grandTotal = $subtotal + $subtotal * $tax;
            }

            //Save booking
            $booking = new Booking();
            $booking->total_price = ($subtotal + ($subtotal * $tax));
            $booking->users_id = Auth::id();
            $booking->save();

            //Create details
            $details = [];
            foreach (session('cart') as $item) {
                $room = Room::find($item['roomId']);
                $detail = new BookingDetail();

                $detail->rooms_id = $item['roomId'];
                $detail->check_in = DateTime::createFromFormat('d/m/Y H:i', $item['checkIn'])->format('Y-m-d H:i:s');
                $detail->check_out = DateTime::createFromFormat('d/m/Y H:i', $item['checkOut'])->format('Y-m-d H:i:s');
                $detail->adult = $item['adults'];
                $detail->children = $item['children'];
                $detail->qty = $item['quantity'];

                $details[] = $detail;

                if (Auth::user()->roles_id === 4) {
                    if (in_array($room->room_types_id, $specialRoomsId)) {
                        $totalPointsGained += 5 * $detail->qty;
                    } else {
                        $checkInDateTime = DateTime::createFromFormat('Y-m-d H:i:s', $detail->check_in);
                        $checkOutDateTime = DateTime::createFromFormat('Y-m-d H:i:s', $detail->check_out);

                        $interval = $checkInDateTime->diff($checkOutDateTime);
                        $days = $interval->days;

                        $roomTotalPrice = $room->price * $detail->qty * $days;

                        $totalPointsGained += 1 * floor($roomTotalPrice / 300000);
                    }
                }
            }

            //Save created details
            $booking->bookingDetails()->saveMany($details);

            //Add points if member
            if (Auth::user()->roles_id === 4) {
                if ($usePoints != 'true') {
                    $point = new Point();
                    $point->users_id = Auth::id();
                    $point->points = $totalPointsGained;
                    $point->save();
                }
                else{
                    $point = new Point();
                    $point->users_id = Auth::id();
                    $point->points = -($pointsDeducted);
                    $point->save();
                }
            }

            session()->forget('cart');

            return redirect()->back()->with('status', 'Your orders are now booked!');
        } else {
            return redirect()->back()->with('status', 'There are no orders to book!');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $subtotal = $request->get('subtotal');
        $usePoints = $request->get('usePoints');
        $pointsTotal = $request->get('pointsTotal');

        //Id for Deluxe, Superior, and Suite rooms
        $specialRoomsId = [2, 3, 4];
        $totalPointsGained = 0;

        if (session('cart')) {
            $request->validate([
                'total' => 'required',
            ]);

            $booking = new Booking();
            $booking->total_price = $request->input('total');
            $booking->users_id = Auth::id();
            $booking->save();

            $details = [];
            // foreach (session('cart') as $item) {
            //     $detail = new BookingDetail([
            //         'check_in' => DateTime::createFromFormat('d/m/Y H:i', $item['checkIn'])->format('Y-m-d H:i:s'),
            //         'check_out' => DateTime::createFromFormat('d/m/Y H:i', $item['checkOut'])->format('Y-m-d H:i:s'),
            //         'adult' => $item['adults'],
            //         'children' => $item['children'],
            //         'qty' => $item['quantity'],
            //     ]);

            //     $detail->room()->attach($item['roomId']);
            //     $details[] = $detail;
            // }
            foreach (session('cart') as $item) {
                $room = Room::find($item['roomId']);
                $detail = new BookingDetail();

                $detail->rooms_id = $item['roomId'];
                $detail->check_in = DateTime::createFromFormat('d/m/Y H:i', $item['checkIn'])->format('Y-m-d H:i:s');
                $detail->check_out = DateTime::createFromFormat('d/m/Y H:i', $item['checkOut'])->format('Y-m-d H:i:s');
                $detail->adult = $item['adults'];
                $detail->children = $item['children'];
                $detail->qty = $item['quantity'];

                $details[] = $detail;

                if (Auth::user()->roles_id === 4) {
                    if (in_array($room->room_types_id, $specialRoomsId)) {
                        $totalPointsGained += 5 * $detail->qty;
                    } else {
                        $checkInDateTime = DateTime::createFromFormat('Y-m-d H:i:s', $detail->check_in);
                        $checkOutDateTime = DateTime::createFromFormat('Y-m-d H:i:s', $detail->check_out);

                        $interval = $checkInDateTime->diff($checkOutDateTime);
                        $days = $interval->days;

                        $roomTotalPrice = $room->price * $detail->qty * $days;

                        $totalPointsGained += 1 * floor($roomTotalPrice / 300000);
                    }
                }
            }

            $booking->bookingDetails()->saveMany($details);

            if (Auth::user()->roles_id === 4) {
                $point = new Point();
                $point->users_id = Auth::id();
                $point->points = $totalPointsGained;
                $point->save();
            }

            session()->forget('cart');

            return redirect()->back()->with('status', 'Your orders are now booked!');
        } else {
            return redirect()->back()->with('status', 'There are no orders to book!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
