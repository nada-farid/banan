<?php

namespace App\Http\Requests;

use App\Models\ProgramGoal;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateProgramGoalRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('program_goal_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'description' => [
                'required',
            ],
        ];
    }
}
