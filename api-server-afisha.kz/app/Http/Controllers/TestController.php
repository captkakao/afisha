<?php

namespace App\Http\Controllers;

use App\Models\Seance;
use App\Services\Auth\AuthTokenService;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test()
    {
        $genres = [
            "Action",
            "Adventure",
            "Animated",
            "Biography",
            "Comedy",
            "Crime",
            "Dance",
            "Disaster",
            "Documentary",
            "Drama",
            "Erotic",
            "Family",
            "Fantasy",
            "Found Footage",
            "Historical",
            "Horror",
            "Independent",
            "Legal",
            "Live Action",
            "Martial Arts",
            "Musical",
            "Mystery",
            "Noir",
            "Performance",
            "Political",
            "Romance",
            "Satire",
            "Science Fiction",
            "Short",
            "Silent",
            "Slasher",
            "Sports",
            "Spy",
            "Superhero",
            "Supernatural",
            "Suspense",
            "Teen",
            "Thriller",
            "War",
            "Western"
        ];

        $editedGenres = [];

        foreach ($genres as $key => $val) {
            $editedGenres[] = [
                'translated_name' => $val,
                'language_id' => 1,
                'genre_id' => $key + 1,
            ];
        }

        return response()->json($editedGenres);
    }
}
