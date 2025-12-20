<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyEmploymentRequest;
use App\Http\Requests\StoreEmploymentRequest;
use App\Http\Requests\UpdateEmploymentRequest;
use App\Models\Employment;
use App\Models\Job;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class EmploymentController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('employment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Employment::with(['job'])->select(sprintf('%s.*', (new Employment)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'employment_show';
                $editGate      = 'employment_edit';
                $deleteGate    = 'employment_delete';
                $crudRoutePart = 'employments';

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
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('email', function ($row) {
                return $row->email ? $row->email : '';
            });
            $table->editColumn('phone', function ($row) {
                return $row->phone ? $row->phone : '';
            });
            $table->editColumn('brief', function ($row) {
                return $row->brief ? $row->brief : '';
            });
            $table->addColumn('job_title', function ($row) {
                return $row->job ? $row->job->title : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'job']);

            return $table->make(true);
        }

        return view('admin.employments.index');
    }

    public function create()
    {
        abort_if(Gate::denies('employment_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jobs = Job::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.employments.create', compact('jobs'));
    }

    public function store(StoreEmploymentRequest $request)
    {
        $employment = Employment::create($request->all());

        if ($request->input('cv', false)) {
            $employment->addMedia(storage_path('tmp/uploads/' . basename($request->input('cv'))))->toMediaCollection('cv');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $employment->id]);
        }

        return redirect()->route('admin.employments.index');
    }

    public function edit(Employment $employment)
    {
        abort_if(Gate::denies('employment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jobs = Job::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $employment->load('job');

        return view('admin.employments.edit', compact('employment', 'jobs'));
    }

    public function update(UpdateEmploymentRequest $request, Employment $employment)
    {
        $employment->update($request->all());

        if ($request->input('cv', false)) {
            if (! $employment->cv || $request->input('cv') !== $employment->cv->file_name) {
                if ($employment->cv) {
                    $employment->cv->delete();
                }
                $employment->addMedia(storage_path('tmp/uploads/' . basename($request->input('cv'))))->toMediaCollection('cv');
            }
        } elseif ($employment->cv) {
            $employment->cv->delete();
        }

        return redirect()->route('admin.employments.index');
    }

    public function show(Employment $employment)
    {
        abort_if(Gate::denies('employment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $employment->load('job');

        return view('admin.employments.show', compact('employment'));
    }

    public function destroy(Employment $employment)
    {
        abort_if(Gate::denies('employment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $employment->delete();

        return back();
    }

    public function massDestroy(MassDestroyEmploymentRequest $request)
    {
        $employments = Employment::find(request('ids'));

        foreach ($employments as $employment) {
            $employment->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('employment_create') && Gate::denies('employment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Employment();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
