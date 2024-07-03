<?php

namespace App\Http\Controllers;

use App\Models\Point;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PointsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function getMemberPoints(){
        $user = Auth::user();
        $points  = Point::where('users_id', '=', $user->id);

        $points_total = 0;

        foreach ($points as $point) {
            $points_total += $point->points;
        }
        return view('cart.index', compact('points_total'));
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
}
