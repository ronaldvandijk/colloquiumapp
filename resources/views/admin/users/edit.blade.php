@extends('layouts.panel', [
    'title' => trans('common.modelupdate', ['modelName' => trans('common.user')]) ,
    'btnText' => trans('common.overview'),
    'btnUrl' => url('/admin/users'),
])

@section('title', trans('common.modelupdate', ['modelName' => trans('common.user')]))

@section('panel-body')
    <form method="post" action="{{ url('/admin/user/update/' . $user->id) }}">
        {{ csrf_field() }}
		{{ method_field('PATCH') }}
        <div class="col-md-6">
        	<div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
        	    <label class="control-label">{{ trans('common.first_name') }}</label>
        	    <input type="text" class="form-control" name="first_name" value="{{ $user->first_name }}">
        	    @if ($errors->has('first_name'))
        	        <span class="help-block">
        	            <strong>{{ $errors->first('first_name') }}</strong>
        	        </span>
        	    @endif
        	</div>

        	<div class="form-group{{ $errors->has('insertion') ? ' has-error' : '' }}">
        	    <label class="control-label">{{ trans('common.insertion') }}</label>
        	    <input type="text" class="form-control" name="insertion" value="{{ $user->insertion }}">
        	    @if ($errors->has('insertion'))
        	        <span class="help-block">
        	            <strong>{{ $errors->first('insertion') }}</strong>
        	        </span>
        	    @endif
        	</div>

        	<div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
        	    <label class="control-label">{{ trans('common.last_name') }}</label>
        	    <input type="text" class="form-control" name="last_name" value="{{ $user->last_name }}">
        	    @if ($errors->has('last_name'))
        	        <span class="help-block">
        	            <strong>{{ $errors->first('last_name') }}</strong>
        	        </span>
        	    @endif
        	</div>

        	<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        	    <label class="control-label">{{ trans('common.email') }}</label>
        	    <input type="text" class="form-control" name="email" value="{{ $user->email }}">
        	    @if ($errors->has('email'))
        	        <span class="help-block">
        	            <strong>{{ $errors->first('email') }}</strong>
        	        </span>
        	    @endif
        	</div>
        </div>
        <div class="col-md-6 col-md-push-1">
            <div class="input-group pull-left">
                <label>{{ trans('common.role') }}</label>
                <select class="form-control" name="role_id">
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}" {{ $role->id === $user->role_id ? 'selected' : null }}>{{ $role->name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('role_id'))
        	        <span class="help-block">
        	            <strong>{{ $errors->first('role_id') }}</strong>
        	        </span>
        	    @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <button type="submit" class="btn btn-success pull-right">{{ trans('common.update') }}</button>
            </div>
        </div>
    </form>
@endsection
