<?php

namespace App\Http\Requests;

use App\Models\ProgramTimeline;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateProgramTimelineRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('program_timeline_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'description' => [
                'string',
                'nullable',
            ],
            'program_id' => [
                'required',
                'integer',
            ],
            'duration' => [
                'string',
                'nullable',
            ],
        ];
    }
}
