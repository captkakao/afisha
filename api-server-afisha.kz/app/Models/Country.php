<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Country extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['slug'];

    public function countryTranslation(): HasOne
    {
        return $this->hasOne(CountryTranslation::class);
    }
}
