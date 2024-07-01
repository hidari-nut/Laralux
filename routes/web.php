<?php

use App\Http\Controllers\HotelsController;
use App\Http\Controllers\RoomsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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


Route::resource('hotels', HotelsController::class);
Route::get('/hotels/{hotel}', [HotelsController::class, 'show'])->name('hotelShow');
Route::get('/hotelsList', [HotelsController::class, 'hotelsList'])->name('hotelList');
Route::post('/hotelsList/edit', [HotelsController::class, 'getEditForm'])->name('hotelsGetEditForm');

Route::resource('rooms', RoomsController::class);
Route::get('/hotels/{hotel}/rooms', [RoomsController::class, 'index'])->name('roomIndex');
Route::get('/hotels/{hotel}/rooms/{room}', [RoomsController::class, 'show'])->name('roomShow');

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/login', function () {
    return view('users.login');
});
Route::get('/register', function () {
    return view('users.register');
});

Route::get('/users', function () {
    return view('users.userslist');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
