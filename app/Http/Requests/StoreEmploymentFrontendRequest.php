<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmploymentFrontendRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Allow all users to submit employment applications
    }

    public function rules()
    {
        return [
            'name' => [
                'required',
                'string',
                'max:255',
            ],
            'email' => [
                'required',
                'email',
                'max:255',
            ],
            'phone' => [
                'required',
                'string',
                'max:20',
            ],
            'job_id' => [
                'required',
                'integer',
                'exists:jobs,id',
            ],
            'brief' => [
                'nullable',
                'string',
            ],
            'cv' => [
                'required',
                'file',
                'mimes:pdf',
                'max:10240', // 10MB
            ],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'الاسم الكامل مطلوب',
            'name.string' => 'الاسم يجب أن يكون نص',
            'email.required' => 'البريد الإلكتروني مطلوب',
            'email.email' => 'البريد الإلكتروني غير صحيح',
            'phone.required' => 'رقم الجوال مطلوب',
            'job_id.required' => 'الوظيفة المتقدم لها مطلوبة',
            'job_id.exists' => 'الوظيفة المحددة غير موجودة',
            'cv.required' => 'يرجى رفع السيرة الذاتية',
            'cv.file' => 'السيرة الذاتية يجب أن تكون ملف',
            'cv.mimes' => 'السيرة الذاتية يجب أن تكون ملف PDF',
            'cv.max' => 'حجم السيرة الذاتية يجب ألا يتجاوز 10 ميجابايت',
        ];
    }
}
