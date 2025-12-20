@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.program.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.programs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.program.fields.id') }}
                        </th>
                        <td>
                            {{ $program->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.program.fields.title') }}
                        </th>
                        <td>
                            {{ $program->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.program.fields.short_description') }}
                        </th>
                        <td>
                            {{ $program->short_description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.program.fields.description') }}
                        </th>
                        <td>
                            {!! $program->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.program.fields.photo') }}
                        </th>
                        <td>
                            @if($program->photo)
                                <a href="{{ $program->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $program->photo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.program.fields.inside_image') }}
                        </th>
                        <td>
                            @if($program->inside_image)
                                <a href="{{ $program->inside_image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $program->inside_image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.program.fields.description_2') }}
                        </th>
                        <td>
                            {!! $program->description_2 !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.program.fields.category') }}
                        </th>
                        <td>
                            {{ $program->category->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.program.fields.start_date') }}
                        </th>
                        <td>
                            {{ $program->start_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.program.fields.end_date') }}
                        </th>
                        <td>
                            {{ $program->end_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.program.fields.group') }}
                        </th>
                        <td>
                            {{ App\Models\Program::GROUP_SELECT[$program->group] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.programs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection