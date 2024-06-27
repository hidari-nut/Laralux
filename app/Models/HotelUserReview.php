<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class HotelUserReview extends Model
{
    use HasFactory;
    public function hotels() : BelongsTo{
        return $this->belongsTo(Hotel::class);
    }
    public function users() : BelongsTo{
        return $this->belongsTo(User::class);
    }
}
