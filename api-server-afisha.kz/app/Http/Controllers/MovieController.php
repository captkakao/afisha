<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Models\Movie;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{
    public function getMovie(Movie $movie)
    {
        $languageId = Language::where('code', App::currentLocale())->first()->id;

        return $movie->select(
            'movies.id',
            'name',
            'original_name',
            DB::raw('AVG(movie_user_grade.grade) as movie_rate'),
            DB::raw('count(movie_user_grade.grade) as grade_count'),
        )->with(['detail' => function ($query) use ($languageId) {
            $query->with(['country.countryTranslation' => function ($q) use ($languageId) {
                $q->where('language_id', $languageId);
            }]);
            $query->with(['producer', 'casts']);
        }])
            ->with(['genres' => function ($query) use ($languageId) {
                $query->select('genres.id');
                $query->with(['genreTranslation' => function ($q) use ($languageId) {
                    $q->select('genre_translations.genre_id', 'genre_translations.translated_name');
                    $q->where('language_id', $languageId);
                }]);
            }])
            ->leftJoin('movie_user_grade', 'movies.id', '=', 'movie_user_grade.movie_id')
            ->leftJoin('movie_details', 'movies.id', '=', 'movie_details.movie_id')
            ->groupBy('movies.id')
            ->first();

//        $movie = Movie::select(
//            'movies.id',
//            'name',
//            'original_name',
//            DB::raw('AVG(movie_user_grade.grade) as movie_rate'),
//            DB::raw('count(movie_user_grade.grade) as grade_count'),
//        )
//            ->with(['detail' => function ($query) use ($languageId) {
//                $query->select(
//                    'movie_id',
//                    'description',
//                    'production_year',
//                    'premiere_date_kz',
//                    'age_rating',
//                    'duration',
//                    'production_country_id',
//                    'producer_id',
//                );
//                $query->with(['country.countryTranslation' => function ($q) use ($languageId) {
//                    $q->where('language_id', $languageId);
//                }]);
//                $query->with(['producer', 'casts']);
//            }])
//            ->with(['genres' => function ($query) use ($languageId) {
//                $query->select('genres.id');
//                $query->with(['genreTranslation' => function ($q) use ($languageId) {
//                    $q->select('genre_translations.genre_id', 'genre_translations.translated_name');
//                    $q->where('language_id', $languageId);
//                }]);
//            }])
//            ->leftJoin('movie_user_grade', 'movies.id', '=', 'movie_user_grade.movie_id')
//            ->leftJoin('movie_details', 'movies.id', '=', 'movie_details.movie_id')
//            ->where('is_active', true)
//            ->whereDate('movie_details.premiere_date_kz', '<', Carbon::now()->toDateString())
//            ->groupBy('movies.id')
//            ->first();
//
//        return $movie;
    }

    public function getShowingNowMovies()
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
            ->leftJoin('movie_details', 'movies.id', '=', 'movie_details.movie_id')
            ->where('is_active', true)
            ->whereDate('movie_details.premiere_date_kz', '<', Carbon::now()->toDateString())
            ->groupBy('movies.id')
            ->get();


        return [
            'data' => $movies,
        ];
    }

    public function getShowingSoonMovies()
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
            ->leftJoin('movie_details', 'movies.id', '=', 'movie_details.movie_id')
            ->where('is_active', true)
            ->whereDate('movie_details.premiere_date_kz', '>', Carbon::now()->toDateString())
            ->groupBy('movies.id')
            ->get();


        return [
            'data' => $movies,
        ];
    }

    public function getShowingKidMovies()
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
            ->leftJoin('movie_details', 'movies.id', '=', 'movie_details.movie_id')
            ->where('is_active', true)
            ->where('movie_details.age_rating', '<', 12)
            ->whereDate('movie_details.premiere_date_kz', '<', Carbon::now()->toDateString())
            ->groupBy('movies.id')
            ->get();


        return [
            'data' => $movies,
        ];
    }
}
