<?php

namespace App\Http\Requests;

use App\Models\Goal;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreGoalRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('goal_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
        ];
    }
}
