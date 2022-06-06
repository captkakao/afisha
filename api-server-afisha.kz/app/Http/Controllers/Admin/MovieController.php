<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Image\ImageUploaderService;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function uploadImages(Request $request, ImageUploaderService $imageUploaderService)
    {
        $imageFiles = $request->file('images');

        return $imageUploaderService->uploadArray($imageFiles);
    }
}
