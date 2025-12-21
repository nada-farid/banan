@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.programTeam.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.program-teams.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="program_id">{{ trans('cruds.programTeam.fields.program') }}</label>
                <select class="form-control select2 {{ $errors->has('program_id') ? 'is-invalid' : '' }}" name="program_id" id="program_id" required>
                    @foreach($programs as $id => $entry)
                        <option value="{{ $id }}" {{ old('program_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('program_id'))
                    <div class="invalid-feedback">
                        {{ $errors->first('program_id') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.programTeam.fields.program_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.programTeam.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.programTeam.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection