<?php

namespace App\Http\Controllers\Available;

use App\Http\Controllers\Controller;
use App\Http\Resources\Available\CityCollection;
use App\Models\City;
use App\Models\Language;
use App\Repositories\Available\CityRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class CityController extends Controller
{
    public function index(): CityCollection
    {
        $languageId = Language::where('code', App::currentLocale())->first()->id;
        $cities = CityRepository::getWithCityTranslationByLanguageId($languageId);
        return new CityCollection($cities);
    }
}
