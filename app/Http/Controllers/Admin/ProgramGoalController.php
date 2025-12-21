<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProgramGoalRequest;
use App\Http\Requests\StoreProgramGoalRequest;
use App\Http\Requests\UpdateProgramGoalRequest;
use App\Models\ProgramGoal;
use App\Models\Program;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProgramGoalController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('program_goal_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $programGoals = ProgramGoal::with(['program'])->get();

        return view('admin.programGoals.index', compact('programGoals'));
    }

    public function create()
    {
        abort_if(Gate::denies('program_goal_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $programs = Program::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.programGoals.create', compact('programs'));
    }

    public function store(StoreProgramGoalRequest $request)
    {
        $programGoal = ProgramGoal::create($request->all());

        return redirect()->route('admin.program-goals.index');
    }

    public function edit(ProgramGoal $programGoal)
    {
        abort_if(Gate::denies('program_goal_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $programs = Program::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $programGoal->load('program');

        return view('admin.programGoals.edit', compact('programGoal', 'programs'));
    }

    public function update(UpdateProgramGoalRequest $request, ProgramGoal $programGoal)
    {
        $programGoal->update($request->all());

        return redirect()->route('admin.program-goals.index');
    }

    public function show(ProgramGoal $programGoal)
    {
        abort_if(Gate::denies('program_goal_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $programGoal->load('program');

        return view('admin.programGoals.show', compact('programGoal'));
    }

    public function destroy(ProgramGoal $programGoal)
    {
        abort_if(Gate::denies('program_goal_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $programGoal->delete();

        return back();
    }

    public function massDestroy(MassDestroyProgramGoalRequest $request)
    {
        $programGoals = ProgramGoal::find(request('ids'));

        foreach ($programGoals as $programGoal) {
            $programGoal->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
