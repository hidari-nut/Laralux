<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookingDetail extends Model
{
    use HasFactory , SoftDeletes;

    public function booking()
    {
        return $this->belongsTo(Booking::class, 'bookings_id');
    }

    public function room()
    {
        return $this->belongsTo(Room::class, 'rooms_id');
    }
}
