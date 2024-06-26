<?php

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
Route::get('/login', function () {
    return view('users.login');
});
Route::get('/register', function () {
    return view('users.register');
});
Route::get('/profile', function () {
    return view('users.profile');
});
Route::get('/booking', function () {
    return view('booking.index');
});
Route::get('/hotels', function () {
    return view('hotels.index');
});
Route::get('/membership', function () {
    return view('membership.index');
});
Route::get('/report', function () {
    return view('report.index');
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
Route::get('/cart', function () {
    return view('booking.cart');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
