<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProgramTeamRequest;
use App\Http\Requests\StoreProgramTeamRequest;
use App\Http\Requests\UpdateProgramTeamRequest;
use App\Models\ProgramTeam;
use App\Models\Program;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProgramTeamController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('program_team_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $programTeams = ProgramTeam::with(['program'])->get();

        return view('admin.programTeams.index', compact('programTeams'));
    }

    public function create()
    {
        abort_if(Gate::denies('program_team_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $programs = Program::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.programTeams.create', compact('programs'));
    }

    public function store(StoreProgramTeamRequest $request)
    {
        $programTeam = ProgramTeam::create($request->all());

        return redirect()->route('admin.program-teams.index');
    }

    public function edit(ProgramTeam $programTeam)
    {
        abort_if(Gate::denies('program_team_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $programs = Program::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $programTeam->load('program');

        return view('admin.programTeams.edit', compact('programTeam', 'programs'));
    }

    public function update(UpdateProgramTeamRequest $request, ProgramTeam $programTeam)
    {
        $programTeam->update($request->all());

        return redirect()->route('admin.program-teams.index');
    }

    public function show(ProgramTeam $programTeam)
    {
        abort_if(Gate::denies('program_team_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $programTeam->load('program');

        return view('admin.programTeams.show', compact('programTeam'));
    }

    public function destroy(ProgramTeam $programTeam)
    {
        abort_if(Gate::denies('program_team_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $programTeam->delete();

        return back();
    }

    public function massDestroy(MassDestroyProgramTeamRequest $request)
    {
        $programTeams = ProgramTeam::find(request('ids'));

        foreach ($programTeams as $programTeam) {
            $programTeam->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
