<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function getNewsById(News $news)
    {
        return $news;
    }

    public function getNews()
    {
        return ['data' => News::latest()->take(10)->get()];
    }

    public function creteNews()
    {
        // TODO
    }
}
