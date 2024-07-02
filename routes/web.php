<?php

use App\Http\Controllers\BookingsController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\HotelsController;
use App\Http\Controllers\RoomsController;
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
// Route::get('/membership/{user_id}', [BookingsController::class, 'checkMemberBookings'])->name('member.checkMemberBookings');
Route::post('/membership', [BookingsController::class, 'checkMemberBookings'])->name('member.checkMemberBookings');


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

Route::resource('hotels', HotelsController::class);
Route::get('/hotels/{hotel}', [HotelsController::class, 'show'])->name('hotelShow');
Route::get('/hotelsList', [HotelsController::class, 'hotelsList'])->name('hotelList');
Route::post('/hotelsList/edit', [HotelsController::class, 'getEditForm'])->name('hotelsGetEditForm');
Route::get('/hotelsList/trashed', [HotelsController::class, 'trashedHotel'])->name('hotelTrashed');
Route::post('/hotels/restore', [HotelsController::class, 'restore'])->name('hotelsRestore');


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

// Route::get('/users', function () {
//     return view('users.userslist');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function(){
    Route::resource('user', UsersController::class);
    Route::resource('booking', BookingsController::class);
    Route::post('cart/addToCart', [FrontEndController::class, 'addToCart'])->name('addToCart');
    Route::post('cart/getEditCartForm', [FrontEndController::class, 'getEditCartForm'])->name('getEditCartForm');
    Route::get('cart/delete/{roomId}', [FrontEndController::class, 'deleteFromCart'])->name('deleteFromCart');
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
    // Route::get('/users', function () {
    //     return view('users.userslist');
    // });
    

    Route::post('user/getEditForm', [UsersController::class, 'getEditForm'])->name('user.getEditForm');
    Route::post('user/getAddForm', [UsersController::class, 'getAddForm'])->name('user.getAddForm');
    Route::put('user/updateStaff/{id}', [UsersController::class, 'updateStaff'])->name('user.updateStaff');
    Route::put('user/promote/{id}', [UsersController::class, 'promoteCustomer'])->name('user.promote');
    Route::put('user/demote/{id}', [UsersController::class, 'demoteCustomer'])->name('user.demote');
    Route::get('users/getAllMember', [UsersController::class, 'getAllMember'])->name('user.getAllMember');
});
