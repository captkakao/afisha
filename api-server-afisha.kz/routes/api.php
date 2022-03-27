<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Available\CityController;
use App\Http\Controllers\Available\DateTimeController;
use App\Http\Controllers\Cinema\CinemaController;
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


Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('test', [TestController::class, 'test']);
});

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    Route::group(['middleware' => ['auth:sanctum'], 'prefix' => 'logout'], function () {
        Route::post('', [AuthController::class, 'logout']);
        Route::post('another', [AuthController::class, 'logoutAnother']);
    });
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::group(['prefix' => 'seance',], function () {
        Route::post('', [SeanceController::class, 'create']); //TODO policy
        Route::put('{seance}', [SeanceController::class, 'update'])->middleware('can:update,seance');
        Route::put('{seance}/seat', [SeanceController::class, 'updateSeat'])->middleware('can:updateSeat,seance');
        Route::delete('{seance}', [SeanceController::class, 'delete'])->middleware('can:delete,seance');
    });

    Route::group(['prefix' => 'me',], function () {
        Route::get('', [UserController::class, 'me']);
        Route::put('', [UserController::class, 'updateProfile']);
        Route::put('password', [UserController::class, 'updatePassword']);
        Route::prefix('avatar')->group(function () {
            Route::post('', [UserController::class, 'uploadAvatar']);
            Route::delete('', [UserController::class, 'removeAvatar']);
        });
    });
});

Route::get('cities', [CityController::class, 'index']);
Route::get('today_tomorrow', [DateTimeController::class, 'getDateTime']);

Route::group(['prefix' => 'cinema',], function () {
    Route::middleware(['auth:sanctum'])->group(function () {
        Route::get('', [CinemaController::class, 'getUserCinemas']);
        Route::post('', [CinemaController::class, 'create']);
        Route::put('{cinema}', [CinemaController::class, 'update'])->middleware('can:update,cinema');
        Route::delete('{cinema}', [CinemaController::class, 'delete'])->middleware('can:delete,cinema');

        Route::get('{cinema}/hall', [HallController::class, 'getHalls']);
        Route::post('{cinema}/hall', [HallController::class, 'createHall'])->middleware('can:createHall,cinema');
        Route::prefix('hall')->group(function () {
            Route::put('{hall}', [HallController::class, 'updateHall'])->middleware('can:update,hall');
            Route::delete('{hall}', [HallController::class, 'deleteHall'])->middleware('can:delete,hall');
        });
        Route::prefix('event')->group(function () {
            Route::get('', [EventController::class, 'getAllEvents']);
            Route::post('images', [EventController::class, 'uploadImages']);
            Route::put('{event}', [EventController::class, 'update'])->middleware('can:update,event');
            Route::delete('{event}', [EventController::class, 'delete'])->middleware('can:delete,event');
            Route::get('{cinema}/event', [EventController::class, 'getEventsByCinema']);
            Route::post('{cinema}/event', [EventController::class, 'create'])->middleware('can:createEvent,cinema');
        });
    });
    Route::get('{cinema}', [CinemaController::class, 'getCinema']);
    Route::get('{cinema}/seances', [CinemaController::class, 'getSeances']);
    Route::get('city/{city}', [CinemaController::class, 'getCityCinemas']);
});
