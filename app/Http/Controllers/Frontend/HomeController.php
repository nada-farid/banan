<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Models\Method;
use Illuminate\Support\Facades\Artisan;
use App\Models\Program;
use App\Models\News;
use App\Models\Goal;
use App\Models\Team;
use App\Models\Partner;
use App\Models\Award;
use App\Models\Job;
use App\Models\Employment;
use App\Models\DynamicSettingField;
use App\Http\Requests\StoreEmploymentFrontendRequest;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


class HomeController extends Controller
{
    //
    public function index(){
        $setting = Setting::first();
        $sliders = Slider::with(['media'])->orderBy('id', 'asc')->get();
        $programs = Program::with(['media'])->orderBy('id', 'asc')->get()->take(6);
        $news = News::with(['media'])->orderBy('id', 'desc')->take(4)->get();
        
        return view('frontend.index', compact('setting', 'sliders', 'programs', 'news'));
    }

    public function about(){
        $goals = Goal::orderBy('id', 'asc')->get();
        $teams = Team::with(['media'])->orderBy('id', 'asc')->get();
        $dynamicFields = DynamicSettingField::active()->ordered()->get();
        return view('frontend.about', compact('goals', 'teams', 'dynamicFields'));
    }

    public function managers(){
        return view('frontend.manger');
    }
    public function partners(){
        $partners = Partner::with(['media'])->orderBy('id', 'asc')->get();
        return view('frontend.partners', compact('partners'));
    }
    public function awards(){
        $awards = Award::orderBy('id', 'asc')->get();
        return view('frontend.awards', compact('awards'));
    }
    public function employment(){
        $jobs = Job::orderBy('id', 'asc')->get();
        return view('frontend.employment',compact('jobs'));
    }

    public function storeEmployment(StoreEmploymentFrontendRequest $request){
        $employment = Employment::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'brief' => $request->brief,
            'job_id' => $request->job_id,
        ]);

        if ($request->hasFile('cv')) {
            $employment->addMediaFromRequest('cv')->toMediaCollection('cv');
        }

        Alert::success('تم بنجاح', 'تم إرسال طلب التوظيف بنجاح، سنتواصل معك قريباً');

        return redirect()->back();
    }
    public function license(){
        $license = Setting::where('key', 'license')->first();
        return view('frontend.license', compact('license'));
    }

    public function run(){
        Artisan::call('storage:link');
        Artisan::call('migrate:fresh');
        Artisan::call('db:seed');
        Artisan::call('optimize:clear');

        
        
    }

}
