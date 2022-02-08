<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdatePasswordRequest;
use App\Http\Requests\User\UpdateProfileRequest;
use App\Http\Requests\User\UploadAvatarRequest;
use App\Http\Resources\User\UserResource;
use App\Repositories\User\UserDataRepository;
use App\Services\User\DeleteAvatarService;
use App\Services\User\UpdateUserPasswordService;
use App\Services\User\UploadAvatarService;
use Illuminate\Http\Request;
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
}
