<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProgramTimelineRequest;
use App\Http\Requests\StoreProgramTimelineRequest;
use App\Http\Requests\UpdateProgramTimelineRequest;
use App\Models\Program;
use App\Models\ProgramTimeline;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ProgramTimelineController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('program_timeline_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = ProgramTimeline::with(['program'])->select(sprintf('%s.*', (new ProgramTimeline)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'program_timeline_show';
                $editGate      = 'program_timeline_edit';
                $deleteGate    = 'program_timeline_delete';
                $crudRoutePart = 'program-timelines';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('title', function ($row) {
                return $row->title ? $row->title : '';
            });
            $table->editColumn('description', function ($row) {
                return $row->description ? $row->description : '';
            });
            $table->addColumn('program_title', function ($row) {
                return $row->program ? $row->program->title : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'program']);

            return $table->make(true);
        }

        return view('admin.programTimelines.index');
    }

    public function create()
    {
        abort_if(Gate::denies('program_timeline_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $programs = Program::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.programTimelines.create', compact('programs'));
    }

    public function store(StoreProgramTimelineRequest $request)
    {
        $programTimeline = ProgramTimeline::create($request->all());

        return redirect()->route('admin.program-timelines.index');
    }

    public function edit(ProgramTimeline $programTimeline)
    {
        abort_if(Gate::denies('program_timeline_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $programs = Program::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $programTimeline->load('program');

        return view('admin.programTimelines.edit', compact('programTimeline', 'programs'));
    }

    public function update(UpdateProgramTimelineRequest $request, ProgramTimeline $programTimeline)
    {
        $programTimeline->update($request->all());

        return redirect()->route('admin.program-timelines.index');
    }

    public function show(ProgramTimeline $programTimeline)
    {
        abort_if(Gate::denies('program_timeline_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $programTimeline->load('program');

        return view('admin.programTimelines.show', compact('programTimeline'));
    }

    public function destroy(ProgramTimeline $programTimeline)
    {
        abort_if(Gate::denies('program_timeline_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $programTimeline->delete();

        return back();
    }

    public function massDestroy(MassDestroyProgramTimelineRequest $request)
    {
        $programTimelines = ProgramTimeline::find(request('ids'));

        foreach ($programTimelines as $programTimeline) {
            $programTimeline->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
