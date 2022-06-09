<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdatePasswordRequest;
use App\Http\Requests\User\UpdateProfileRequest;
use App\Http\Requests\User\UploadAvatarRequest;
use App\Http\Resources\Movie\MovieCollection;
use App\Http\Resources\User\UserResource;
use App\Models\Language;
use App\Models\User;
use App\Repositories\User\UserDataRepository;
use App\Services\User\DeleteAvatarService;
use App\Services\User\UpdateUserPasswordService;
use App\Services\User\UploadAvatarService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function me(): UserResource
    {
        return new UserResource(Auth::user());
    }

    public function updateProfile(UpdateProfileRequest $request)
    {
        UserDataRepository::updateProfile(Auth::user(), $request->first_name, $request->last_name, $request->birthdate);
    }

    public function updatePassword(UpdatePasswordRequest $request, UpdateUserPasswordService $service)
    {
        $service->handlePasswordUpdate($request->new_password);
    }

    public function uploadAvatar(UploadAvatarRequest $request, UploadAvatarService $service)
    {
        // TODO file upload on NGINX
        $service->handleAvatarUpload(Auth::user(), $request->file('avatar'));
        return response()->json([
            'avatar_url' => url('/storage/' . $service->getUploadFilePath()),
        ]);
    }

    public function removeAvatar(DeleteAvatarService $service)
    {
        $service->handleAvatarDelete(Auth::user());
        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function getFavouriteMovies()
    {
        $languageId = Language::where('code', App::currentLocale())->first()->id;
        $currentUser = Auth::user();

        $userFavouriteMovies = User::with(['favouriteMovies' => function ($query) use ($languageId) {
            $query->with(['images' => function ($query) {
                $query->where('is_logo', true);
            }])
                ->where('is_active', true);

            $query->with(['genres' => function ($query) use ($languageId) {
                $query->select('genres.id');
                $query->with(['genreTranslation' => function ($q) use ($languageId) {
                    $q->select('genre_translations.genre_id', 'genre_translations.translated_name');
                    $q->where('language_id', $languageId);
                }]);
            }]);
        }])
            ->where('id', $currentUser->id)
            ->first();

//        return response()->json([
//            'data' => $userFavouriteMovies->favouriteMovies
//        ]);
        return new MovieCollection($userFavouriteMovies->favouriteMovies);
    }
}
