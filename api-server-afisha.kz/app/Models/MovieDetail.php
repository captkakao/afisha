<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'production_country_id');
    }

    public function producer(): BelongsTo
    {
        return $this->belongsTo(MovieUser::class, 'producer_id');
    }

    public function casts(): BelongsToMany
    {
        return $this->belongsToMany(MovieUser::class, 'movie_cast', 'movie_id', 'cast_id');
    }
}
