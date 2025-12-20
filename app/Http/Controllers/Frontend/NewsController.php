<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::with(['media'])->orderBy('id', 'desc')->paginate(12);
        
        return view('frontend.news', compact('news'));
    }

    public function show($slug)
    {
        $news = News::with(['media'])->where('slug', $slug)->firstOrFail();
        $recentNews = News::with(['media'])->where('slug', '!=', $slug)->orderBy('id', 'desc')->take(4)->get();
        
        return view('frontend.news-details', compact('news', 'recentNews'));
    }
}
