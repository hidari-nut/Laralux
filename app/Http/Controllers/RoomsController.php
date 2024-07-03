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

        $newRoom = new Room();
        $newRoom->name = $request->get("name");
        $newRoom->description = $request->get("description");
        $newRoom->capacity = $request->get("capacity");
        $newRoom->price = $request->get("price");
        if ($request->hasFile('image')) {
            if (($newRoom->image) && ($newRoom->image != "noimage.jpeg")) {
                unlink('assets/img/rooms/' . $newRoom->image);
            }
            $file = $request->file('image');
            $filename = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
            $file->move('assets/img/rooms', $filename);
            $newRoom->image = $filename;
        }
        $newRoom->availability = $request->get("availability");
        $newRoom->room_types_id = $request->get("room_types_id");
        $newRoom->hotels_id = $request->get("hotels_id");
        $newRoom->save();

        return redirect()->route('roomList', [$request->get("hotels_id")])->with('status', 'Your hotel is successfully updated!');

    }

    /**
     * Display the specified resource.
     */
    public function show($hotelId, $roomId)
    {
        //
        $roomDatas = Room::with(['products', 'roomType'])
            ->where('id', $roomId)
            ->findOrFail($roomId);

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
                'image' => 'nullable',
                'availability' => 'required|integer',
                'room_types_id' => 'required|integer',
                'hotels_id' => 'required|integer',
            ]);
        } catch (ValidationException $e) {
            dd($e->errors());
        }

        //dd($request->all());

        $updatedRoom = $room;

        $updatedRoom->name = $request->get("name");
        $updatedRoom->description = $request->get("description");
        $updatedRoom->capacity = $request->get("capacity");
        $updatedRoom->price = $request->get("price");
        if ($request->hasFile('image')) {
            if (($updatedRoom -> image) && ($updatedRoom->image != "noimage.jpeg")) {
                unlink('assets/img/rooms/' . $updatedRoom->image);
            }
            $file = $request->file('image');
            $filename = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
            $file->move('assets/img/rooms', $filename);
            $updatedRoom->image = $filename;
        }
        $updatedRoom->availability = $request->get("availability");
        $updatedRoom->room_types_id = $request->get("room_types_id");
        $updatedRoom->hotels_id = $request->get("hotels_id");
        //dd($updatedHotel);
        $updatedRoom->save();

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
            return redirect()->route('roomTrashed', $hotelId)->with('status', 'Room successfully restored!');
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