<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyHawkmaCategoryRequest;
use App\Http\Requests\StoreHawkmaCategoryRequest;
use App\Http\Requests\UpdateHawkmaCategoryRequest;
use App\Models\HawkmaCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HawkmaCategoryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('hawkma_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hawkmaCategories = HawkmaCategory::all();

        return view('admin.hawkmaCategories.index', compact('hawkmaCategories'));
    }

    public function create()
    {
        abort_if(Gate::denies('hawkma_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.hawkmaCategories.create');
    }

    public function store(StoreHawkmaCategoryRequest $request)
    {
        $hawkmaCategory = HawkmaCategory::create($request->all());

        return redirect()->route('admin.hawkma-categories.index');
    }

    public function edit(HawkmaCategory $hawkmaCategory)
    {
        abort_if(Gate::denies('hawkma_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.hawkmaCategories.edit', compact('hawkmaCategory'));
    }

    public function update(UpdateHawkmaCategoryRequest $request, HawkmaCategory $hawkmaCategory)
    {
        $hawkmaCategory->update($request->all());

        return redirect()->route('admin.hawkma-categories.index');
    }

    public function show(HawkmaCategory $hawkmaCategory)
    {
        abort_if(Gate::denies('hawkma_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.hawkmaCategories.show', compact('hawkmaCategory'));
    }

    public function destroy(HawkmaCategory $hawkmaCategory)
    {
        abort_if(Gate::denies('hawkma_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hawkmaCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroyHawkmaCategoryRequest $request)
    {
        $hawkmaCategories = HawkmaCategory::find(request('ids'));

        foreach ($hawkmaCategories as $hawkmaCategory) {
            $hawkmaCategory->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
