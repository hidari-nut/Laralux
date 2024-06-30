<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hotel extends Model
{
    use HasFactory , SoftDeletes;

    public function rooms() : HasMany{
        return $this->hasMany(Room::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'hotel_user_reviews')
                    ->withPivot('review', 'rating')
                    ->withTimestamps();
    }
    public function types() : BelongsTo{
        return $this->belongsTo(HotelType::class, 'hotel_types_id');
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
