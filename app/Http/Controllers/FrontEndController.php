<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function addToCart(Request $request){
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

        $cart[$request->roomId] = [
            'roomId' => $request->roomId,
            'roomName' => $room->name,
            'hotelName' => $room->hotel->name,
            'checkIn' => $request->checkinDate,
            'checkOut' => $request->checkOutDate,
            'adults' => $request->adults,
            'children' => $request->children,
            'quantity' => $request->rooms,
            'price' => $request->price,
        ];

        session()->put('cart', $cart);
        return redirect()->back()->with('status', 'Room added to cart!');
    }
}
