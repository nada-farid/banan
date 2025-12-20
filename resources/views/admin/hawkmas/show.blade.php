@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.hawkma.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.hawkmas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.hawkma.fields.id') }}
                        </th>
                        <td>
                            {{ $hawkma->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hawkma.fields.title') }}
                        </th>
                        <td>
                            {{ $hawkma->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hawkma.fields.file') }}
                        </th>
                        <td>
                            @if($hawkma->file)
                                <a href="{{ $hawkma->file->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hawkma.fields.description') }}
                        </th>
                        <td>
                            {{ $hawkma->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hawkma.fields.category') }}
                        </th>
                        <td>
                            {{ $hawkma->category->title ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.hawkmas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection