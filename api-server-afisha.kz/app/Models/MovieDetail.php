<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'production_country_id',
        'production_year',
        'premiere_date_kz',
        'age_rating',
        'duration',
        'producer_id',
    ];
}
