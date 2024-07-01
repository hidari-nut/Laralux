<?php

namespace App\Http\Controllers;

use App\Models\HotelType;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;

class HotelTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $hotelTypesDatas = HotelType::all();
        return view('hotels.typeslist', compact('hotelTypesDatas'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
        $hotelType = HotelType::create($request->all());
        return response()->json($hotelType, 201);
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

        //dd($request->all());

        $newType = new HotelType();

        $newType->name = $request->get("name");

        $newType->save();

        return redirect()->route('hotelTypes')->with('status', 'Your hotel type has been successfully created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(HotelType $hotelType)
    {
        //
        return $hotelType;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
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

        //dd($request->all());

        $updatedType = HotelType::find($id);
        //dd($updatedType);

        $updatedType->name = $request->get("name");
        //dd($updatedType);

        $updatedType->save();

        return redirect()->route('hotelTypes')->with('status', 'Your hotel type is successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $hotelType = HotelType::find($id);
        if ($hotelType) {
            $hotelType->delete();
            return redirect()->route('hotelTypes')->with('status', 'Hotel type successfully deleted!');
        }
        return redirect()->route('hotelTypes')->with('error', 'Hotel type not found!');
    }

    public function trashedType()
    {
        $trashedTypes = HotelType::onlyTrashed()->get();
        return view('hotels.trashedType', compact('trashedTypes'));
    }

    public function restore(Request $request)
    {
        $id = $request->input('type_id');
        //dd($id);
        $type = HotelType::withTrashed()->find($id);
        if ($type) {
            $type->restore();
            return redirect()->route('hotelTypesTrashed')->with('status', 'Type successfully restored!');
        }
        return redirect()->route('hotelTypesTrashed')->with('error', 'Type not found!');
    }
    
    public function getEditForm(Request $request)
    {
       
        $id = $request->id;
        $type = HotelType::find($id);
        //dd($type);
        return response()->json(
            [
                'status' => 'oke',
                'msg' => view('hotels.edittype', compact('type'))->render(),
            ],
            200,
        );
    }
}
