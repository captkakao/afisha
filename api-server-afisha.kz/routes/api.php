<?php

use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Available\CityController;
use App\Http\Controllers\Available\DateTimeController;
use App\Http\Controllers\Cinema\CinemaController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\Verification\EmailVerificationController;
use App\Http\Controllers\Event\EventController;
use App\Http\Controllers\Hall\HallController;
use App\Http\Controllers\Seance\SeanceController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('test', [TestController::class, 'test']);

// LOGIN & REGISTRATION
Route::group(['prefix' => 'auth'], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    Route::group(['middleware' => ['auth:sanctum'], 'prefix' => 'logout'], function () {
        Route::post('', [AuthController::class, 'logout']);
        Route::post('another', [AuthController::class, 'logoutAnother']);
    });
});

// EMAIL CONFIRMATION
Route::prefix('/email-confirmation')->group(function () {
    Route::post('/send', [EmailVerificationController::class, 'send'])->middleware('throttle:1,' . ((int)config('services.email_resend_timeout_sec') / 60));
//    Route::post('/send', [EmailVerificationController::class, 'send']);
    Route::post('/confirm', [EmailVerificationController::class, 'confirm']);
});

Route::middleware(['auth:sanctum'])->group(function () {
    // SEANCES
    Route::group(['prefix' => 'seance',], function () {
        Route::post('', [SeanceController::class, 'create']); //TODO policy
        Route::put('{seance}', [SeanceController::class, 'update'])->middleware('can:update,seance');
        Route::put('{seance}/seat', [SeanceController::class, 'updateSeat'])->middleware('can:updateSeat,seance'); // TODO refactor payload length
        Route::get('{seance}/hall-config', [SeanceController::class, 'getHallConfig']);
        Route::delete('{seance}', [SeanceController::class, 'delete'])->middleware('can:delete,seance');
    });

    // USER DATA
    Route::group(['prefix' => 'me',], function () {
        Route::get('', [UserController::class, 'me']);
        Route::put('', [UserController::class, 'updateProfile']);
        Route::put('password', [UserController::class, 'updatePassword']);
        Route::prefix('avatar')->group(function () {
            Route::post('', [UserController::class, 'uploadAvatar']);
            Route::delete('', [UserController::class, 'removeAvatar']);
        });
        Route::get('favourite-movies', [UserController::class, 'getFavouriteMovies']);
    });

    // USER DATA
    Route::group(['prefix' => 'ticket',], function () {
        Route::post('send', [TicketController::class, 'sendTicket']);
    });
});

Route::get('cities', [CityController::class, 'index']);
Route::get('today_tomorrow', [DateTimeController::class, 'getDateTime']);

// CINEMA
Route::group(['prefix' => 'cinema',], function () {
    Route::middleware(['auth:sanctum'])->group(function () {
        Route::get('', [CinemaController::class, 'getUserCinemas']);
        Route::post('', [CinemaController::class, 'create']);
        Route::put('{cinema}', [CinemaController::class, 'update'])->middleware('can:update,cinema');
        Route::delete('{cinema}', [CinemaController::class, 'delete'])->middleware('can:delete,cinema');

        // CINEMA HALLS
        Route::get('{cinema}/hall', [HallController::class, 'getHalls']);
        Route::post('{cinema}/hall', [HallController::class, 'createHall'])->middleware('can:createHall,cinema');
        Route::prefix('hall')->group(function () {
            Route::put('{hall}', [HallController::class, 'updateHall'])->middleware('can:update,hall');
            Route::delete('{hall}', [HallController::class, 'deleteHall'])->middleware('can:delete,hall');
        });

        // CINEMA EVENTS
        Route::prefix('event')->group(function () {
            Route::post('images', [EventController::class, 'uploadImages']);
            Route::put('{event}', [EventController::class, 'update'])->middleware('can:update,event');
            Route::delete('{event}', [EventController::class, 'delete'])->middleware('can:delete,event');
            Route::get('{cinema}/event', [EventController::class, 'getEventsByCinema']);
            Route::post('{cinema}/event', [EventController::class, 'create'])->middleware('can:createEvent,cinema');
        });
    });

    // CINEMA SEANCES
    Route::get('{cinema}', [CinemaController::class, 'getCinema']);
    Route::get('{cinema}/seances', [CinemaController::class, 'getSeances']);
    Route::get('city/{city}', [CinemaController::class, 'getCityCinemas']);
});

Route::group(['prefix' => 'news',], function () {
    Route::get('', [NewsController::class, 'getNews']);
    Route::get('{news}', [NewsController::class, 'getNewsById']);
});

Route::group(['prefix' => 'movie',], function () {
    Route::get('{movie}', [MovieController::class, 'getMovie']);
    Route::get('{movie}/seances', [MovieController::class, 'getMovieSeances']);


    Route::middleware(['auth:sanctum'])->group(function () {
        Route::post('{movie}/rate', [MovieController::class, 'rateMovie']);
        Route::post('{movie}/favourite', [MovieController::class, 'addRemoveFavourite']);
    });

    Route::group(['prefix' => 'showing',], function () {
        Route::get('now', [MovieController::class, 'getShowingNowMovies']);
        Route::get('soon', [MovieController::class, 'getShowingSoonMovies']);
        Route::get('kids', [MovieController::class, 'getShowingKidMovies']);
    });
});

Route::group(['prefix' => 'admin',], function () {
    Route::prefix('movie')->group(function () {
        Route::post('images', [\App\Http\Controllers\Admin\MovieController::class, 'uploadImages']);
    });
});
