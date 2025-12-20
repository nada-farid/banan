<?php

namespace App\Http\Requests;

use App\Models\News;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreNewsRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('news_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'short_description' => [
                'required',
            ],
            'description' => [
                'required',
            ],
            'photo' => [
                'required',
            ],
            'inside_image' => [
                'required',
            ],
            'description_2' => [
                'required',
            ],
            'address' => [
                'string',
                'nullable',
            ],
        ];
    }
}
