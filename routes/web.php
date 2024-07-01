<?php

use App\Http\Controllers\BookingsController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

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
});
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


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth'])->group(function(){
    Route::resource('user', UsersController::class);
    Route::resource('booking', BookingsController::class);
    Route::resource('report',ReportController::class);
    Route::get('/cart', function () {
        return view('booking.cart');
    });
    Route::get('/booking', function () {
        return view('booking.index');
    });


    Route::get('/report',[ReportController::class,'reporting']);
    Route::get('/profile', function () {
        return view('users.profile');
    });


});
