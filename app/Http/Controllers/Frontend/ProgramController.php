<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Slider;
use Illuminate\Http\Request;
use Alert;
use App\Models\Method;
use Illuminate\Support\Facades\Artisan;
use App\Models\Program;
use App\Models\Category;

class ProgramController extends Controller
{
    //
    public function index(){
        $programs = Program::orderBy('id', 'asc')->paginate(8);
        $categories = Category::all();
        
        return view('frontend.programs', compact('programs', 'categories'));
    }

    public function show($slug){
        $program = Program::where('slug', $slug)->first();
        return view('frontend.program-details', compact('program'));
    }

}
