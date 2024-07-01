<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        
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
    public function show(string $id)
    {
        //
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

    public function reporting(){
        $rooms =  DB::table('rooms')->join('hotels as h','rooms.hotels_id','=','h.id')
        ->join('booking_details as bd','rooms.id','=','bd.rooms_id')
        ->select('rooms.id','rooms.name as room_name','h.name as hotel_name', DB::raw('COUNT(bd.id) as reservation_count'))
        ->groupby('rooms.id','rooms.name','h.name')
        ->orderby('reservation_count','desc')
        ->limit(3)
        ->get();
        
        $bookings = DB::table('users')->join('bookings as bd','users.id','=','bd.users_id')
        ->select('users.id','users.name as username',DB::raw('COUNT(bd.id) as total_bookings'))
        ->groupBy('users.id','users.name')
        ->orderBy('total_bookings','desc')
        ->get();

        $points = DB::table('users')->join('points as p','users.id','=','p.users_id')
        ->select('users.id','users.name as username',DB::raw('SUM(p.points) as total_points'))
        ->groupBy('users.id','users.name')
        ->orderBy('total_points','desc')
        ->get();
      
        return view('report.index',["rooms" =>$rooms,"points"=>$points,"bookings"=>$bookings]);
    }
}
