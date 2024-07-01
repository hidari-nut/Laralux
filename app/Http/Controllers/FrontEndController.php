<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function addToCart($roomId){
        $room = Room::find($roomId);
        $cart = session()->get('cart');
        if(!isset($cart[$roomId])){
            $cart[$roomId] = [
                'roomId' => $roomId,
                'name' => $room->name,
                ''
            ]
        }
    }
}
