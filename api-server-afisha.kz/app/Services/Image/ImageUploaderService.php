<?php

namespace App\Services\Image;

use App\Models\Image;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ImageUploaderService
{
    const UPLOAD_FOLDER_NAME = 'images';

    /**
     * @param UploadedFile[] $images
     */
    public function uploadArray(array $images): array
    {
        $uploadedImages = [];
        foreach ($images as $image) {
            $uploadedImages[] = $this->upload($image);
        }

        return $uploadedImages;
    }

    public function upload(UploadedFile $image): Image
    {
        $imageName = $this->generateImageName($image);
        $imagePath = $this->storeImage($image, $imageName);

        return Image::create([
            'image_path' => $imagePath,
        ]);
    }

    protected function storeImage(UploadedFile $image, string $imageName): string
    {
        Storage::disk('public')
            ->putFileAs(self::UPLOAD_FOLDER_NAME, $image, $imageName);

        return self::UPLOAD_FOLDER_NAME . '/' . $imageName;
    }

    protected function generateImageName(UploadedFile $image): string
    {
        $name  = 'image_' . $image->getSize();
        $name .= '_' . time();
        $name .= '.' . $image->getClientOriginalExtension();

        return $name;
    }
}
