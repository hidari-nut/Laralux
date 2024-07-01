<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function addToCart(Request $request){
        $room = Room::find($request->roomId);
        $cart = session()->get('cart');
        if(!isset($cart[$request->roomId])){
            $cart[$request->roomId] = [
                'roomId' => $request->roomId,
                'roomName' => $room->name,
                'hotelName' => $room->hotel->name,
                'checkIn' => $request->checkIn,
                'checkOut' => $request->checkOut,
                'adults' => $request->adults,
                'children' => $request->children,
                'quantity' => $request->quantity,
            ];
        }
        else{
            $cart[$request->roomId]['quantity']++;
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('status', 'Room added to cart!');
    }
}
