<?php

namespace App\Http\Requests;

use App\Models\ProgramTeam;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreProgramTeamRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('program_team_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
        ];
    }
}
