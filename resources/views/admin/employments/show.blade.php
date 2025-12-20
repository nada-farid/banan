@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.employment.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.employments.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.employment.fields.id') }}
                        </th>
                        <td>
                            {{ $employment->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employment.fields.name') }}
                        </th>
                        <td>
                            {{ $employment->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employment.fields.email') }}
                        </th>
                        <td>
                            {{ $employment->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employment.fields.phone') }}
                        </th>
                        <td>
                            {{ $employment->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employment.fields.cv') }}
                        </th>
                        <td>
                            @if($employment->cv)
                                <a href="{{ $employment->cv->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employment.fields.brief') }}
                        </th>
                        <td>
                            {{ $employment->brief }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employment.fields.job') }}
                        </th>
                        <td>
                            {{ $employment->job->title ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.employments.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection