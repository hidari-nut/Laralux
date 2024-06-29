<?php

namespace App\Http\Controllers;
use App\Models\HotelType;
use Illuminate\Http\Request;

class HotelTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return HotelType::all();
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
        $hotelType = HotelType::create($request->all());
        return response()->json($hotelType, 201);
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
    public function edit(Request $request, HotelType $hotelType)
    {
        //
        $hotelType->update($request->all());
        return response()->json($hotelType, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HotelType $hotelType)
    {
        //
        $hotelType->delete(); 
        return response()->json(null, 204);
    }

    public function trashed()
    {
        return HotelType::onlyTrashed()->get(); 
    }

    public function restore($id)
    {
        $hotelType = HotelType::withTrashed()->find($id);
        if ($hotelType) {
            $hotelType->restore(); 
            return response()->json($hotelType, 200);
        }
        return response()->json(null, 404);
    }
}
