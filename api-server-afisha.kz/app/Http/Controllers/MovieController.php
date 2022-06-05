<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function getNowShowingMovies()
    {
        $movies = Movie::where('is_active', true)->get();
    }
}
