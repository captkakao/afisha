<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieAward extends Model
{
    use HasFactory;

    protected $fillable = [
        'award_id',
        'movie_id',
    ];
}
