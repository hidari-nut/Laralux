<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;
use Illuminate\Support\Facades\DB;

class HotelsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hotelsDatas =  Hotel::select('hotels.id','hotels.name', 'hotels.image', 'hotels.description', DB::raw('AVG(hotel_user_reviews.rating) as rating'), DB::raw('MIN(rooms.price) as min_price'))
        ->leftJoin('hotel_user_reviews', 'hotels.id', '=', 'hotel_user_reviews.hotel_id')
        ->leftJoin('rooms', 'rooms.hotels_id', '=', 'hotels.id')
        ->join('hotel_types', 'hotel_types.id','=','hotels.hotel_types_id')
        ->groupBy('hotels.id','hotels.name', 'hotels.image', 'hotels.description')
        ->get();
        return view('hotels.index', compact('hotelsDatas'));

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
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $hotelsDatas =  Hotel::select('hotels.id','hotels.name', 'hotels.image', 'hotels.description','hotel_types.name as type', 'citys.name as citys','citys.latitude','citys.longitude', 'states.name as states', 'countrys.name as countrys', DB::raw('AVG(hotel_user_reviews.rating) as rating'), DB::raw('MIN(rooms.price) as min_price'))
        ->leftJoin('hotel_user_reviews', 'hotels.id', '=', 'hotel_user_reviews.hotel_id')
        ->leftJoin('rooms', 'rooms.hotels_id', '=', 'hotels.id')
        ->join('hotel_types', 'hotel_types.id','=','hotels.hotel_types_id')
        ->join('citys', 'citys.id','=','hotels.citys_id')
        ->join('states','states.id','=','citys.states_id')
        ->join('countrys','countrys.id','=','states.countrys_id')
        ->groupBy('hotels.id','hotels.name', 'hotels.image', 'hotels.description','hotel_types.name', 'citys.name','citys.latitude','citys.longitude', 'states.name', 'countrys.name')
        ->findOrFail($id);
        return view('hotels.details', compact('hotelsDatas'));
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
