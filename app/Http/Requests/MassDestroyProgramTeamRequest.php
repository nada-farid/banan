<?php

namespace App\Http\Requests;

use App\Models\ProgramTeam;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyProgramTeamRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('program_team_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:program_teams,id',
        ];
    }
}
