<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use HasFactory , SoftDeletes;
    public function hotel() : BelongsTo{
        return $this->belongsTo(Hotel::class, 'hotels_id');
    }

    public function roomType()
    {
        return $this->belongsTo(RoomType::class, 'room_types_id');
    }

    public function bookingDetails()
    {
        return $this->hasMany(BookingDetail::class);
    }
    public function products()
    {
        return $this->hasMany(Product::class, 'rooms_id');
    }
}
