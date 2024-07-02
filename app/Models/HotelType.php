<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class HotelType extends Model
{
    use HasFactory , SoftDeletes;
    // protected $primaryKey = 'id';
    public function hotels() : HasMany{
        return $this->hasMany(Hotel::class, 'hotel_types_id');
    }
}
