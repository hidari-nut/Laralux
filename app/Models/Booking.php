<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use HasFactory , SoftDeletes;

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function bookingDetails()
    {
        return $this->hasMany(BookingDetail::class, 'bookings_id');
    }
}
