<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyProgramRequest;
use App\Http\Requests\StoreProgramRequest;
use App\Http\Requests\UpdateProgramRequest;
use App\Models\Category;
use App\Models\Program;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ProgramController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('program_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Program::with(['category'])->select(sprintf('%s.*', (new Program)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'program_show';
                $editGate      = 'program_edit';
                $deleteGate    = 'program_delete';
                $crudRoutePart = 'programs';

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
            $table->editColumn('short_description', function ($row) {
                return $row->short_description ? $row->short_description : '';
            });
            $table->editColumn('photo', function ($row) {
                if ($photo = $row->photo) {
                    return sprintf(
                        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
                        $photo->url,
                        $photo->thumbnail
                    );
                }

                return '';
            });
            $table->addColumn('category_title', function ($row) {
                return $row->category ? $row->category->title : '';
            });

            $table->editColumn('group', function ($row) {
                return $row->group ? Program::GROUP_SELECT[$row->group] : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'photo', 'category']);

            return $table->make(true);
        }

        return view('admin.programs.index');
    }

    public function create()
    {
        abort_if(Gate::denies('program_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.programs.create', compact('categories'));
    }

    public function store(StoreProgramRequest $request)
    {
        // إنشاء slug فريد
        $baseSlug = Str::slug($request->input('title'), '-');
        $slug = $baseSlug;
        $counter = 1;
        
        // التأكد من أن الـ slug فريد
        while (Program::where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }
        
        $program = Program::create([
            'title' => $request->input('title'),
            'short_description' => $request->input('short_description'),
            'description' => $request->input('description'),
            'description_2' => $request->input('description_2'),
            'category_id' => $request->input('category_id'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'group' => $request->input('group'),
            'slug' => $slug,
        ]);
    
        if ($request->input('photo', false)) {
            $program->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        if ($request->input('inside_image', false)) {
            $program->addMedia(storage_path('tmp/uploads/' . basename($request->input('inside_image'))))->toMediaCollection('inside_image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $program->id]);
        }

        return redirect()->route('admin.programs.index');
    }

    public function edit(Program $program)
    {
        abort_if(Gate::denies('program_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $program->load('category');

        return view('admin.programs.edit', compact('categories', 'program'));
    }

    public function update(UpdateProgramRequest $request, Program $program)
    {
        // إنشاء slug فريد إذا تم تغيير العنوان
        if ($request->has('title') && $request->input('title') !== $program->title) {
            $baseSlug = Str::slug($request->input('title'), '-');
            $slug = $baseSlug;
            $counter = 1;
            
            // التأكد من أن الـ slug فريد (باستثناء البرنامج الحالي)
            while (Program::where('slug', $slug)->where('id', '!=', $program->id)->exists()) {
                $slug = $baseSlug . '-' . $counter;
                $counter++;
            }
            
            $request->merge(['slug' => $slug]);
        }
        
        $program->update($request->all());

        if ($request->input('photo', false)) {
            if (! $program->photo || $request->input('photo') !== $program->photo->file_name) {
                if ($program->photo) {
                    $program->photo->delete();
                }
                $program->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
            }
        } elseif ($program->photo) {
            $program->photo->delete();
        }

        if ($request->input('inside_image', false)) {
            if (! $program->inside_image || $request->input('inside_image') !== $program->inside_image->file_name) {
                if ($program->inside_image) {
                    $program->inside_image->delete();
                }
                $program->addMedia(storage_path('tmp/uploads/' . basename($request->input('inside_image'))))->toMediaCollection('inside_image');
            }
        } elseif ($program->inside_image) {
            $program->inside_image->delete();
        }

        return redirect()->route('admin.programs.index');
    }

    public function show(Program $program)
    {
        abort_if(Gate::denies('program_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $program->load('category');

        return view('admin.programs.show', compact('program'));
    }

    public function destroy(Program $program)
    {
        abort_if(Gate::denies('program_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $program->delete();

        return back();
    }

    public function massDestroy(MassDestroyProgramRequest $request)
    {
        $programs = Program::find(request('ids'));

        foreach ($programs as $program) {
            $program->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('program_create') && Gate::denies('program_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Program();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
