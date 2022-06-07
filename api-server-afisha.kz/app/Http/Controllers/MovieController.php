<?php

namespace App\Http\Controllers;

use App\Http\Requests\Cinema\GetSeancesRequest;
use App\Http\Resources\Movie\MovieCollection;
use App\Http\Resources\Movie\MovieResource;
use App\Models\Language;
use App\Models\Movie;
use App\Models\Seance;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{
    public function getMovie(Movie $movie)
    {
        $languageId = Language::where('code', App::currentLocale())->first()->id;

        return new MovieResource($movie->select(
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
            ->with(['images' => function ($query) {
                $query->where('is_logo', false);
            }])
            ->leftJoin('movie_user_grade', 'movies.id', '=', 'movie_user_grade.movie_id')
            ->leftJoin('movie_details', 'movies.id', '=', 'movie_details.movie_id')
            ->groupBy('movies.id')
            ->first());
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
            ->with(['images' => function ($query) {
                $query->where('is_logo', true);
            }])
            ->leftJoin('movie_user_grade', 'movies.id', '=', 'movie_user_grade.movie_id')
            ->leftJoin('movie_details', 'movies.id', '=', 'movie_details.movie_id')
            ->where('is_active', true)
            ->whereDate('movie_details.premiere_date_kz', '<', Carbon::now()->toDateString())
            ->groupBy('movies.id')
            ->get();

        return new MovieCollection($movies);
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
            ->with(['images' => function ($query) {
                $query->where('is_logo', true);
            }])
            ->leftJoin('movie_user_grade', 'movies.id', '=', 'movie_user_grade.movie_id')
            ->leftJoin('movie_details', 'movies.id', '=', 'movie_details.movie_id')
            ->where('is_active', true)
            ->whereDate('movie_details.premiere_date_kz', '>', Carbon::now()->toDateString())
            ->groupBy('movies.id')
            ->get();


        return new MovieCollection($movies);
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
            ->with(['images' => function ($query) {
                $query->where('is_logo', true);
            }])
            ->leftJoin('movie_user_grade', 'movies.id', '=', 'movie_user_grade.movie_id')
            ->leftJoin('movie_details', 'movies.id', '=', 'movie_details.movie_id')
            ->where('is_active', true)
            ->where('movie_details.age_rating', '<', 12)
            ->whereDate('movie_details.premiere_date_kz', '<', Carbon::now()->toDateString())
            ->groupBy('movies.id')
            ->get();

        return new MovieCollection($movies);
    }

    public function getMovieSeances(GetSeancesRequest $request, Movie $movie)
    {
        $datetime = $request->datetime;
        $date = Carbon::parse($datetime)->toDateString();

        return Seance::query()
            ->select([
                'seances.id as seance_id',
                'show_time',
                'halls.name as hall_name',
                'price_adult',
                'price_kid',
                'price_student',
                'price_vip',
                'cinemas.id as cinema_id',
                'cinemas.name as cinema_name',
                'cinemas.address as cinema_address',
                'cinemas.phone as cinema_phone',
            ])
            ->leftJoin('halls', 'seances.hall_id', '=', 'halls.id')
            ->leftJoin('cinemas', 'halls.cinema_id', '=', 'cinemas.id')
            ->where('seances.movie_id', $movie->id)
            ->where('seances.show_time', '>', $datetime)
            ->whereDate('seances.show_time', '=', $date)
            ->paginate();

    }
}
