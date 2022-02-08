<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityTranslation extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['translated_name', 'language_id', 'city_id'];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
