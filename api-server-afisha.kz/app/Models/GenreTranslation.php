<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GenreTranslation extends Model
{
    use HasFactory;

    protected $hidden = [
//        'genre_id',
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
        'translated_name',
        'language_id',
        'genre_id',
    ];
}
