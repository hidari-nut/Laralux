<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\HotelType;
use Illuminate\Http\Request;
use App\Models\Hotel;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class HotelsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hotelsDatas = Hotel::select('hotels.id', 'hotels.name', 'hotels.image', 'hotels.description', DB::raw('AVG(hotel_user_reviews.rating) as rating'), DB::raw('MIN(rooms.price) as min_price'))
            ->leftJoin('hotel_user_reviews', 'hotels.id', '=', 'hotel_user_reviews.hotel_id')
            ->leftJoin('rooms', 'rooms.hotels_id', '=', 'hotels.id')
            ->join('hotel_types', 'hotel_types.id', '=', 'hotels.hotel_types_id')
            ->groupBy('hotels.id', 'hotels.name', 'hotels.image', 'hotels.description')
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
        try {
            $request->validate([
                'name' => 'required',
                'description' => 'required',
                'address' => 'required',
                'citys_id' => 'required|integer',
                'image_path' => 'required',
                'email' => 'required|email',
                'phone_number' => 'required',
                'hotel_types_id' => 'required|integer',
            ]);
        } catch (ValidationException $e) {
            dd($e->errors());
        }

        $newHotel = new Hotel();
        $newHotel->name = $request->get("name");
        $newHotel->description = $request->get("description");
        $newHotel->address = $request->get("address");
        $newHotel->citys_id = $request->get("citys_id");
        $newHotel->image = $request->get("image_path");
        $newHotel->email = $request->get("email");
        $newHotel->phone_number = $request->get("phone_number");
        $newHotel->hotel_types_id = $request->get("hotel_types_id");

        $newHotel->save();

        return redirect()->route('hotelList')->with('status', 'Your hotel has been successfully created!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $hotelsDatas = Hotel::select(
            'hotels.*',
            'hotel_types.name as type',
            'citys.name as citys',
            'citys.latitude',
            'citys.longitude',
            'states.name as states',
            'countrys.name as countrys',
            DB::raw('AVG(hotel_user_reviews.rating) as rating')
        )
            ->leftJoin('hotel_user_reviews', 'hotels.id', '=', 'hotel_user_reviews.hotel_id')
            ->leftJoin('rooms', 'rooms.hotels_id', '=', 'hotels.id')
            ->join('hotel_types', 'hotel_types.id', '=', 'hotels.hotel_types_id')
            ->join('citys', 'citys.id', '=', 'hotels.citys_id')
            ->join('states', 'states.id', '=', 'citys.states_id')
            ->join('countrys', 'countrys.id', '=', 'states.countrys_id')
            ->groupBy(
                'hotels.id',
                'hotels.name',
                'hotels.description',
                'hotels.address',
                'hotels.citys_id',
                'hotels.image',
                'hotels.email',
                'hotels.created_at',
                'hotels.updated_at',
                'hotels.deleted_at',
                'hotels.hotel_types_id',
                'hotels.phone_number',
                'hotel_types.name',
                'citys.name',
                'citys.latitude',
                'citys.longitude',
                'states.name',
                'countrys.name'
            )
            ->findOrFail($id);

        $hotelsRec = Hotel::select('hotels.id', 'hotels.name', 'hotels.image', 'hotels.description', DB::raw('AVG(hotel_user_reviews.rating) as rating'), DB::raw('MIN(rooms.price) as min_price'))
            ->leftJoin('hotel_user_reviews', 'hotels.id', '=', 'hotel_user_reviews.hotel_id')
            ->leftJoin('rooms', 'rooms.hotels_id', '=', 'hotels.id')
            ->join('hotel_types', 'hotel_types.id', '=', 'hotels.hotel_types_id')
            ->groupBy('hotels.id', 'hotels.name', 'hotels.image', 'hotels.description')
            ->orderBy('rating', 'desc')
            ->take(3)
            ->get();

        return view('hotels.details', compact('hotelsDatas', 'hotelsRec'));
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
    public function update(Request $request, Hotel $hotel)
    {
        //
        try {
            $request->validate([
                'name' => 'required',
                'description' => 'required',
                'address' => 'required',
                'citys_id' => 'required|integer',
                'image_path' => 'required',
                'email' => 'required|email',
                'phone_number' => 'required',
                'hotel_types_id' => 'required|integer',
            ]);
        } catch (ValidationException $e) {
            dd($e->errors());
        }

        //dd($request->all());

        $updatedHotel = $hotel;

        $updatedHotel->name = $request->get("name");
        $updatedHotel->description = $request->get("description");
        $updatedHotel->address = $request->get("address");
        $updatedHotel->citys_id = $request->get("citys_id");
        $updatedHotel->image = $request->get("image_path");
        $updatedHotel->email = $request->get("email");
        $updatedHotel->phone_number = $request->get("phone_number");
        $updatedHotel->hotel_types_id = $request->get("hotel_types_id");
        //dd($updatedHotel);
        $updatedHotel->save();

        return redirect()->route('hotelList')->with('status', 'Your hotel is successfully updated!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $hotel = Hotel::find($id);
        if ($hotel) {
            $hotel->delete();
            return redirect()->route('hotelList')->with('status', 'Hotel successfully deleted!');
        }
        return redirect()->route('hotelList')->with('error', 'Hotel not found!');
    }

    public function trashedHotel()
    {
        $trashedHotels = Hotel::onlyTrashed()->get();
        return view('hotels.trashedHotel', compact('trashedHotels'));
    }

    public function restore(Request $request)
    {
        $id = $request->input('hotel_id');
        $hotel = Hotel::withTrashed()->find($id);
        if ($hotel) {
            $hotel->restore();
            return redirect()->route('hotelTrashed')->with('status', 'Hotel successfully restored!');
        }
        return redirect()->route('hotelTrashed')->with('error', 'Hotel not found!');
    }

    public function hotelsList()
    {
        $hotelsDatas = Hotel::with(['types', 'city'])->get();
        $city = City::all();
        $types = HotelType::all();

        return view('hotels.hotelslist', compact('hotelsDatas', 'city', 'types'));
    }

    public function getEditForm(Request $request)
    {
        $id = $request->id;
        $hotel = Hotel::find($id);
        $cities = City::all();
        $types = HotelType::all();
        return response()->json(
            [
                'status' => 'oke',
                'msg' => view('hotels.edithotel', compact('hotel', 'cities', 'types'))->render(),
            ],
            200,
        );
    }
    


}
