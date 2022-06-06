<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_path',
        'is_logo',
    ];

    protected $hidden = [
        'pivot',
        'created_at',
        'updated_at',
    ];
}
