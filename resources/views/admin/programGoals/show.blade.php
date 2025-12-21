@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.programGoal.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.program-goals.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.programGoal.fields.id') }}
                        </th>
                        <td>
                            {{ $programGoal->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.programGoal.fields.program') }}
                        </th>
                        <td>
                            {{ $programGoal->program->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.programGoal.fields.title') }}
                        </th>
                        <td>
                            {{ $programGoal->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.programGoal.fields.description') }}
                        </th>
                        <td>
                            {{ $programGoal->description }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.program-goals.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection