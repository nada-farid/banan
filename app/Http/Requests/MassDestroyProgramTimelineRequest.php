<?php

namespace App\Http\Requests;

use App\Models\ProgramTimeline;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyProgramTimelineRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('program_timeline_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:program_timelines,id',
        ];
    }
}
