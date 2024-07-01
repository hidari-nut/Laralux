<?php

namespace App\Http\Controllers;

use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return RoomType::all();
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
        $roomType = RoomType::create($request->all());
        return response()->json($roomType, 201);
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
    public function update(Request $request, RoomType $roomType)
    {
        //
        $roomType->update($request->all());
        return response()->json($roomType, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( RoomType $roomType)
    {
        //
        $roomType->delete(); 
        return response()->json(null, 204);
    }

    public function trashed()
    {
        return RoomType::onlyTrashed()->get(); 
    }

    public function restore($id)
    {
        $roomType = RoomType::withTrashed()->find($id);
        if ($roomType) {
            $roomType->restore(); 
            return response()->json($roomType, 200);
        }
        return response()->json(null, 404);
    }
}
