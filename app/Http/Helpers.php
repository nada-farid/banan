<?php

use App\Models\Setting;
use App\Models\DynamicSettingField;
use Illuminate\Support\Facades\Cache;
use App\Models\Course;
use App\Models\CourseStudent;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

if (!function_exists('get_date')) {
    function get_date($date)
    {
        return $date->translatedFormat('d F Y');
    }
}
if (!function_exists('get_setting')) {
    function get_setting($key, $default = null)
    {
        $settings = Cache::remember('business_settings', 86400, function () {
            return Setting::all();
        });

        $setting = $settings->where('key', $key)->first();

        if ($setting == null) {
            return $default;
        }

        $value = $setting->value;
        
        // Try to decode JSON if it's a JSON string
        if (is_string($value)) {
            $decoded = json_decode($value, true);
            if (json_last_error() === JSON_ERROR_NONE) {
                return $decoded;
            }
        }
        
        return $value;
    }
}

if (!function_exists('get_dynamic_field')) {
    function get_dynamic_field($key, $default = null)
    {
        $field = Cache::remember('dynamic_field_' . $key, 86400, function () use ($key) {
            return DynamicSettingField::where('key', $key)->active()->first();
        });

        if ($field == null) {
            return $default;
        }

        return $field;
    }
}

if (!function_exists('get_dynamic_fields')) {
    function get_dynamic_fields()
    {
        return Cache::remember('dynamic_fields_active', 86400, function () {
            return DynamicSettingField::active()->ordered()->get();
        });
    }
}

if (!function_exists('certificate_store')) {
    function certificate_store($courseStudentId)
    {
        $courseStudent = CourseStudent::findOrFail($courseStudentId);
        $courseStudent->load('course');

        $path = 'public/courses/course_' . $courseStudent->id . '_' . $courseStudent->course_id . '.pdf';

        if (!Storage::exists($path)) {
            $day = Carbon::parse($courseStudent->course->start_at)->format('D');
            $days = [
                'Sun' => 'الأحد',
                'Mon' => 'الإثنين',
                'Tue' => 'الثلاثاء',
                'Wed' => 'الأربعاء',
                'Thu' => 'الخميس',
                'Fri' => 'الجمعة',
                'Sat' => 'السبت',
            ];

            $data = [
                'name' => $courseStudent->name,
                'course_name' => $courseStudent->course->title ?? '',
                'day' => $days[$day],
                'trainer' => $courseStudent->course->trainer ?? '',
                'attend_type' => $courseStudent->course->attend_type ? Course::ATTEND_TYPE_SELECT[$courseStudent->course->attend_type] : '',
                'course_date' => $courseStudent->course->start_at ? Carbon::parse($courseStudent->course->start_at)->format('Y / m / d') : '',

            ];
            $html = view('admin.courses.certificate', $data)->render();
            $pdf = PDF::loadHTML($html)->output();

            Storage::put($path, $pdf);
        }
        return $path;
    }
}