<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'original_name',
        'is_active',
    ];

    public function genres(): BelongsToMany
    {
        return $this->belongsToMany(Genre::class, 'movie_genre');
    }

    public function detail(): HasOne
    {
        return $this->hasOne(MovieDetail::class);
    }

    public function images(): BelongsToMany
    {
        return $this->belongsToMany(Image::class, 'movie_images');
    }

    public function userGrades(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'movie_user_grade');
    }
}
