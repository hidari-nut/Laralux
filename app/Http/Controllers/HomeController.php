<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\User;
use App\Models\State;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Home data 1: Summary data
        $hotelsQty = Hotel::count();
        $usersQty = User::where('roles_id', 3)->count();
        $statesQty = State::count();

        // Home data 2: Top rated hotels
        $topRatedHotels = Hotel::select('hotels.id', 'hotels.name', 'hotels.description', DB::raw('MIN(rooms.price) AS min_price'), 'hur.rating')
            ->join('hotel_user_reviews AS hur', 'hur.hotel_id', '=', 'hotels.id')
            ->join('rooms', 'rooms.hotels_id', '=', 'hotels.id')
            ->where('hur.rating', '>', 3)
            ->groupBy('hotels.id', 'hotels.name', 'hotels.description', 'hur.rating')
            ->orderBy('hur.rating', 'DESC')
            ->limit(3)
            ->get();


        // Home data 3: Latest reviews
        $latestReviews = DB::table('hotel_user_reviews')
            ->join('users', 'users.id', '=', 'hotel_user_reviews.user_id')
            ->where('hotel_user_reviews.rating', '>', 3)
            ->orderBy('hotel_user_reviews.updated_at', 'desc')
            ->limit(3)
            ->get(['users.name', 'users.img', 'hotel_user_reviews.review', 'hotel_user_reviews.rating']);

        //dd($hotelsQty, $usersQty, $statesQty, $topRatedHotels, $latestReviews);


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
      
        return view('home.index', compact('hotelsQty', 'usersQty', 'statesQty', 'topRatedHotels', 'latestReviews', 'rooms', 'bookings', 'points'));
    }
}
