<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Hawkma;
use Illuminate\Http\Request;
use App\Models\HawkmaCategory;
use App\Models\Report;
use App\Models\ReportCategory;

class HawkmaController extends Controller
{
    public function policies(){
        $policies = Hawkma::orderBy('id', 'asc')->get();
        $categories = HawkmaCategory::orderBy('id', 'asc')->get();
        return view('frontend.policies', compact('policies', 'categories'));
    }
    public function reports(){
        $reports = Report::orderBy('id', 'asc')->get();
        $categories = ReportCategory::orderBy('id', 'asc')->get();
        return view('frontend.reports', compact('reports', 'categories'));
    }
}