<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'original_name',
        'is_active',
        'premiere_date',
        'duration',
        'director',
        'cast',
    ];
}
