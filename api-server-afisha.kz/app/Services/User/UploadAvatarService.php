<?php

namespace App\Services\User;

use App\Models\User;
use App\Repositories\User\UserDataRepository;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class UploadAvatarService
{
    const UPLOAD_PATH = 'avatars';
    private User|Authenticatable $user;
    private UploadedFile $file;
    private string $newFileName, $uploadFilePath;

    public function handleAvatarUpload(User|Authenticatable $user, UploadedFile $file)
    {
        $this->user = $user;
        $this->file = $file;
        $this->newFileName = $this->generateNewFileName();
        $this->checkForAvatarExistance();
        $this->storeFile();
        $this->storeAvatar();
    }

    private function generateNewFileName(): string
    {
        return 'avatar_' . $this->user->id . '_' . time() . '.' . $this->file->getClientOriginalExtension();
    }

    private function checkForAvatarExistance(): void
    {
        if ($this->user->avatar) {
            $this->removeFile();
        }
    }

    private function removeFile(): void
    {
        Storage::delete($this->user->avatar);
    }

    private function storeFile(): void
    {
        Storage::disk('public')->putFileAs(self::UPLOAD_PATH, $this->file, $this->newFileName);
    }

    private function storeAvatar(): void
    {
        $this->uploadFilePath = self::UPLOAD_PATH . '/' . $this->newFileName;
        UserDataRepository::storeAvatarFilename($this->user, $this->uploadFilePath);
    }

    public function getUploadFilePath(): string
    {
        return $this->uploadFilePath;
    }
}
