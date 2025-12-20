@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.programTimeline.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.program-timelines.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.programTimeline.fields.id') }}
                        </th>
                        <td>
                            {{ $programTimeline->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.programTimeline.fields.title') }}
                        </th>
                        <td>
                            {{ $programTimeline->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.programTimeline.fields.description') }}
                        </th>
                        <td>
                            {{ $programTimeline->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.programTimeline.fields.program') }}
                        </th>
                        <td>
                            {{ $programTimeline->program->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.programTimeline.fields.duration') }}
                        </th>
                        <td>
                            {{ $programTimeline->duration }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.program-timelines.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection