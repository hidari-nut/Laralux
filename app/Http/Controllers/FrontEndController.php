<?php

namespace App\Http\Controllers;

use App\Models\Room;
use DateTime;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function addToCart(Request $request)
    {
        $room = Room::find($request->roomId);
        $cart = session()->get('cart');
        // if(!isset($cart[$request->roomId])){
        //     $cart[$request->roomId] = [
        //         'roomId' => $request->roomId,
        //         'roomName' => $room->name,
        //         'hotelName' => $room->hotel->name,
        //         'checkIn' => $request->checkinDate,
        //         'checkOut' => $request->checkOutDate,
        //         'adults' => $request->adults,
        //         'children' => $request->children,
        //         'quantity' => $request->rooms,
        //         'price' => $request->price,
        //     ];
        // }
        // else{
        //     $cart[$request->roomId]['quantity']++;
        // }

        $checkInDateTime = DateTime::createFromFormat('d/m/Y H.i', $request->checkInDate);
        $checkOutDateTime = DateTime::createFromFormat('d/m/Y H.i', $request->checkOutDate);

        $checkInString = $checkInDateTime->format('d/m/Y H:i');
        $checkOutString = $checkOutDateTime->format('d/m/Y H:i');

        $interval = $checkInDateTime->diff($checkOutDateTime);
        $days = $interval->days;

        $cart[$request->roomId] = [
            'roomId' => $request->roomId,
            'roomName' => $room->name,
            'hotelName' => $room->hotel->name,
            'checkIn' => $checkInString,
            'checkOut' => $checkOutString,
            'days' => $days,
            'adults' => $request->adults,
            'children' => $request->children,
            'quantity' => $request->rooms,
            'price' => $request->price,
        ];

        session()->put('cart', $cart);
        return redirect()->back()->with('status', 'Room added to cart!');
    }
}
