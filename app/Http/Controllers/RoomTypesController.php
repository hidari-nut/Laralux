<?php

namespace App\Http\Controllers;

use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class RoomTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $roomTypesDatas = RoomType::all();
        return view('room.typeslist', compact('roomTypesDatas'));
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
                'name' => 'required'
            ]);
        } catch (ValidationException $e) {
            dd($e->errors());
        }
        $newType = new RoomType();

        $newType->name = $request->get("name");

        $newType->save();

        return redirect()->route('roomTypes')->with('status', 'Your room type has been successfully created!');
   
    }

    /**
     * Display the specified resource.
     */
    public function show(RoomType $roomType)
    {
        //
        return $roomType;
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
    public function update(Request $request, String $id)
    {
        //
        try {
            $request->validate([
                'name' => 'required'
            ]);
        } catch (ValidationException $e) {
            dd($e->errors());
        }

        $updatedType = RoomType::find($id);

        $updatedType->name = $request->get("name");

        $updatedType->save();

        return redirect()->route('roomTypes')->with('status', 'Your room type is successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $roomType = RoomType::find($id);
        if ($roomType) {
            $roomType->delete();
            return redirect()->route('roomTypes')->with('status', 'Room type successfully deleted!');
        }
        return redirect()->route('roomTypes')->with('error', 'Room type not found!');

    }

    public function trashedType()
    {
        $trashedTypes = RoomType::onlyTrashed()->get();
        return view('room.trashedType', compact('trashedTypes'));
    }

    public function restore(Request $request)
    {
        $id = $request->input('type_id');
        //dd($id);
        $type = RoomType::withTrashed()->find($id);
        if ($type) {
            $type->restore();
            return redirect()->route('roomTypesTrashed')->with('status', 'Type successfully restored!');
        }
        return redirect()->route('roomTypesTrashed')->with('error', 'Type not found!');
    }

    public function getEditForm(Request $request)
    {
       
        $id = $request->id;
        $type = RoomType::find($id);
        //dd($type);
        return response()->json(
            [
                'status' => 'oke',
                'msg' => view('room.edittype', compact('type'))->render(),
            ],
            200,
        );
    }
}
