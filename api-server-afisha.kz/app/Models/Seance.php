<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Seance extends Model
{
    use HasFactory;

    protected $fillable = [
        'showtime',
        'price_adult',
        'price_kid',
        'price_student',
        'price_vip',
        'movie_id',
        'hall_id',
    ];
}
