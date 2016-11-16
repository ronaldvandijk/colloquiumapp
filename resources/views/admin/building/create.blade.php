@extends('layouts.panel', [
    'title' => trans('admin/building/create.addbuilding-capt'),
    'btnText' => trans('common.overview'),
    'btnUrl' => url('/admin/buildings'),
    'btnType' => 'default',
])

@section('title','Admin - ' . trans('admin/room.create_title'))

@section('panel-body')
    <form action="/admin/buildings" method="POST">
        {{ csrf_field() }}
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label class="control-label">{{ trans('admin/building/create.name-capt') }}</label>
            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            <label class="control-label">{{ trans('admin/building/create.location-capt') }}</label>
            <select class="form-control" name="location_id">
                @foreach($locations as $location)
                    <option value="{{ $location->id }}" {{ $location->id === old('location_id') ? 'selected' : null }}>{{ $location->name }}</option>
                @endforeach
            </select>
            @if ($errors->has('location_id'))
    	        <span class="help-block">
    	            <strong>{{ $errors->first('role_id') }}</strong>
    	        </span>
    	    @endif
        </div>

        <div class="form-group{{ $errors->has('abbreviation') ? ' has-error' : '' }}">
            <label class="control-label">{{ trans('admin/building/create.abbreviation-capt') }}</label>
            <input type="text" class="form-control" name="abbreviation" value="{{ old('abbreviation') }}">
            @if ($errors->has('abbreviation'))
                <span class="help-block">
                    <strong>{{ $errors->first('abbreviation') }}</strong>
                </span>
            @endif
        </div>
        <div class="row">
	        <div class="col-md-12">
	            <button type="submit" class="btn btn-success pull-right">{{ trans('common.create') }}</button>
	        </div>
	    </div>
    </form>
@endsection
