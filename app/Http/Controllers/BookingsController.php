<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\BookingDetail;
use App\Models\Point;
use App\Models\Room;
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
        //
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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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
