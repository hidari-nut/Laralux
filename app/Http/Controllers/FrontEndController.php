<?php

namespace App\Http\Controllers;

use App\Models\Point;
use App\Models\Room;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontEndController extends Controller
{

    public function showCart() {
        $user = Auth::user();
    
        if ($user->roles_id == 4) {
            $points = Point::where('users_id', '=', $user->id)->get();
    
            $points_total = 0;
    
            foreach ($points as $point) {
                $points_total += $point->points;
            }
    
            return view('booking.cart', compact('points_total'));
        }
    
        return view('booking.cart');
    }

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

    public function getEditCartForm(Request $request){
        $item = session('cart')[$request->roomId];
        $room = Room::find($request->roomId);
        return response()->json(
            [
                'status' => 'oke',
                'msg' => view('booking.editcart', compact('room', 'item'))->render(),
            ],
            200,
        );
    }

    public function deleteFromCart($roomId)
    {
        $cart = session()->get('cart');
        if (isset($cart[$roomId])) {
            unset($cart[$roomId]);
        }
        session()->forget('cart');
        session()->put('cart', $cart);
        return redirect()->back()->with('status', 'Item deleted from cart!');
    }
}
