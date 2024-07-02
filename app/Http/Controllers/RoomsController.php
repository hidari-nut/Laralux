<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

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
        try {
            $request->validate([
                'name' => 'required',
                'price' => 'required',
                'capacity' => 'required|integer',
                'description' => 'required',
                'image' => 'required',
                'availability' => 'required|integer',
                'room_types_id' => 'required|integer',
                'hotels_id' => 'required|integer',
            ]);
        } catch (ValidationException $e) {
            dd($e->errors());
        }

        //dd($request->all());

        $newHotel = new Room();
        $newHotel->name = $request->get("name");
        $newHotel->description = $request->get("description");
        $newHotel->capacity = $request->get("capacity");
        $newHotel->price = $request->get("price");
        $newHotel->image = $request->get("image");
        $newHotel->availability = $request->get("availability");
        $newHotel->room_types_id = $request->get("room_types_id");
        $newHotel->hotels_id = $request->get("hotels_id");
        $newHotel->save();

        return redirect()->route('roomList', [$request->get("hotels_id")])->with('status', 'Your hotel is successfully updated!');

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

        $roomsRec = Room::with(['products'])
            ->where('hotels_id', $hotelId)
            ->orderBy('price', 'asc')
            ->limit(3)
            ->get();

        //dd($roomIds);
        return view('room.roomdetail', compact('roomDatas', 'roomsRec'));
    }

    public function roomsList($hotelId)
    {
        $roomsDatas = Room::with(['roomType'])
            ->where('hotels_id', $hotelId)
            ->get();
        $hotelDatas = Room::with(['roomType'])
            ->where('hotels_id', $hotelId)
            ->first();
        //dd($roomsDatas);
        $types = RoomType::all();

        return view('room.roomslist', compact('roomsDatas', 'types', 'hotelDatas'));
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
        try {
            $request->validate([
                'name' => 'required',
                'price' => 'required',
                'capacity' => 'required|integer',
                'description' => 'required',
                'image' => 'required',
                'availability' => 'required|integer',
                'room_types_id' => 'required|integer',
                'hotels_id' => 'required|integer',
            ]);
        } catch (ValidationException $e) {
            dd($e->errors());
        }

        //dd($request->all());

        $updatedHotel = $room;

        $updatedHotel->name = $request->get("name");
        $updatedHotel->description = $request->get("description");
        $updatedHotel->capacity = $request->get("capacity");
        $updatedHotel->price = $request->get("price");
        $updatedHotel->image = $request->get("image");
        $updatedHotel->availability = $request->get("availability");
        $updatedHotel->room_types_id = $request->get("room_types_id");
        $updatedHotel->hotels_id = $request->get("hotels_id");
        //dd($updatedHotel);
        $updatedHotel->save();

        return redirect()->route('roomList', [$request->get("hotels_id")])->with('status', 'Your hotel is successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $room = Room::find($id);
        if ($room) {
            $room->delete();
            return redirect()->route('roomList', [$room->hotels_id])->with('status', 'Room successfully deleted!');
        }
        return redirect()->route('roomList', [$room->hotels_id])->with('error', 'Room not found!');
    }

    public function trashedRoom($hotelId)
    {
        $roomDatas = Room::with('products')
        ->where('hotels_id', $hotelId)
        ->first();

        $trashedRooms = Room::onlyTrashed()->where('hotels_id', $hotelId)->get();
        return view('room.trashedRoom', compact('trashedRooms', 'roomDatas'));
    }

    public function restore(Request $request)
    {
        //dd($request);
        $id = $request->input('room_id');
        $hotelId = $request->get('hotel_id');
        //dd($hotelId);
        $room = Room::withTrashed()->find($id);
        if ($room) {
            $room->restore();
            return redirect()->route('roomTrashed',$hotelId)->with('status', 'Room successfully restored!');
        }
        return redirect()->route('roomTrashed', $hotelId)->with('error', 'Room not found!');
    }
    public function getEditForm(Request $request)
    {

        $id = $request->id;
        $room = Room::find($id);
        $types = RoomType::all();
        return response()->json(
            [
                'status' => 'oke',
                'msg' => view('room.editroom', compact('room', 'types'))->render(),
            ],
            200,
        );
    }
}