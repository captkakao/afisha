<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{
    public function getNowShowingMovies()
    {
        $languageId = Language::where('code', App::currentLocale())->first()->id;

        $movies = Movie::select(
            'movies.id', 'name', DB::raw('AVG(movie_user_grade.grade) as movie_rate')
        )
            ->with(['genres' => function ($query) use ($languageId) {
                $query->select('genres.id');
                $query->with(['genreTranslation' => function ($q) use ($languageId) {
                    $q->select('genre_translations.genre_id', 'genre_translations.translated_name');
                    $q->where('language_id', $languageId);
                }]);
            }])
            ->leftJoin('movie_user_grade', 'movies.id', '=', 'movie_user_grade.movie_id')
            ->where('is_active', true)
            ->groupBy('movies.id')
            ->get();


        return [
            'data' => $movies,
        ];
    }
}
