<?php

use App\Http\Controllers\BookingsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\HotelsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home.index');
});

Route::get('/hotels', function () {
    return view('hotels.index');
});
Route::get('/membership', function () {
    return view('membership.index');
})->name('membership');
Route::get('/membership/{user_id}', [BookingsController::class, 'checkMemberBookings'])->name('member.checkMemberBookings');


Route::get('/room', function () {
    return view('room.index');
});
Route::get('/roomlist', function () {
    return view('room.roomslist');
});
Route::get('/roomdetail', function () {
    return view('room.roomdetail');
});
Route::get('/hoteldetail', function () {
    return view('hotels.hoteldetail');
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/hotels', [HotelsController::class, 'index'])->name('hotelIndex');
Route::get('/hotels/{hotel}', [HotelsController::class, 'show'])->name('hotelShow');

Route::get('/login', function () {
    return view('users.login');
});
Route::get('/register', function () {
    return view('users.register');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function(){
    Route::resource('user', UsersController::class);
    Route::resource('booking', BookingsController::class);
    Route::get('/cart', function () {
        return view('booking.cart');
    });
    Route::get('/booking', function () {
        return view('booking.index');
    });
    Route::get('/report', function () {
        return view('report.index');
    });
    Route::get('/profile', function () {
        return view('users.profile');
    });
});
