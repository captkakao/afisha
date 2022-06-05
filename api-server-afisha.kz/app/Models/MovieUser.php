<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'full_original_name',
        'born_date',
        'born_country_id',
        'height',
    ];
}
