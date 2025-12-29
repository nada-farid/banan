<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;

class MediaController extends Controller
{
    public function index()
    {
        $galleries = Gallery::orderBy('id', 'desc')->paginate(7);
        return view('frontend.media', compact('galleries'));
    }
    public function show($id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('frontend.media-details', compact('gallery'));
    }
}