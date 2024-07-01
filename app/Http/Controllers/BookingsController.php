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
                // Create a new instance of BookingDetail
                $detail = new BookingDetail();

                // Assign attributes individually
                $detail->rooms_id = $item['roomId'];  
                $detail->check_in = DateTime::createFromFormat('d/m/Y H:i', $item['checkIn'])->format('Y-m-d H:i:s');
                $detail->check_out = DateTime::createFromFormat('d/m/Y H:i', $item['checkOut'])->format('Y-m-d H:i:s');
                $detail->adult = $item['adults'];
                $detail->children = $item['children'];
                $detail->qty = $item['quantity'];

                $details[] = $detail;
            }

            $booking->bookingDetails()->saveMany($details);

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
