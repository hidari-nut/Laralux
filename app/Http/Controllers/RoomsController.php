<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($hotelId)
    {
        //
        $roomsDatas = Room::with('products')
            ->where('hotels_id', $hotelId)
            ->get();

        //dd($roomsDatas);
        return view('room.index', compact('roomsDatas'));
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
        //
        $room = Room::create($request->all());
        return response()->json($room, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($roomId, $hotelId)
    {
        //
        $roomDatas = Room::with(['products', 'roomType'])
            ->where('id', $roomId)
            ->where('hotels_id', $hotelId)
            ->first();

        $roomIds = Room::join('products', 'products.rooms_id', '=', 'rooms.id')
            ->join('room_types', 'rooms.room_types_id', '=', 'room_types.id')
            ->where('rooms.hotels_id', $hotelId)
            ->orderBy('rooms.price', 'asc')
            ->distinct()
            ->pluck('rooms.id')
            ->take(3);

        $roomsRec = Room::with('products')
            ->whereIn('id', $roomIds)
            ->get();
            
        //dd($roomDatas);
        return view('room.roomdetail', compact('roomDatas', 'roomsRec'));
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
    public function update(Request $request, Room $room)
    {
        //
        $room->update($request->all());
        return response()->json($room, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        //
        $room->delete();
        return response()->json(null, 204);
    }

    public function trashed()
    {
        return Room::onlyTrashed()->get();
    }

    public function restore($id)
    {
        $room = Room::withTrashed()->find($id);
        if ($room) {
            $room->restore();
            return response()->json($room, 200);
        }
        return response()->json(null, 404);
    }
}