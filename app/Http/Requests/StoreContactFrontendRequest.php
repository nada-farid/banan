<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactFrontendRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Allow all users to submit contact forms
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
                'nullable',
                'string',
                'max:20',
            ],
            'message' => [
                'required',
                'string',
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
            'phone.string' => 'رقم الهاتف يجب أن يكون نص',
            'message.required' => 'الرسالة مطلوبة',
            'message.string' => 'الرسالة يجب أن تكون نص',
        ];
    }
}
