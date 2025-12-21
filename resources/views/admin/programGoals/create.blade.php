@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.programGoal.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.program-goals.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="program_id">{{ trans('cruds.programGoal.fields.program') }}</label>
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
                <span class="help-block">{{ trans('cruds.programGoal.fields.program_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.programGoal.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', '') }}" required>
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.programGoal.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="description">{{ trans('cruds.programGoal.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description" required>{{ old('description') }}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.programGoal.fields.description_helper') }}</span>
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