@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.programTeam.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.program-teams.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.programTeam.fields.id') }}
                        </th>
                        <td>
                            {{ $programTeam->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.programTeam.fields.program') }}
                        </th>
                        <td>
                            {{ $programTeam->program->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.programTeam.fields.name') }}
                        </th>
                        <td>
                            {{ $programTeam->name }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.program-teams.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection