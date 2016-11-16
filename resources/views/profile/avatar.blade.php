@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
    @include('profile.profileSidebar')
    <div class="col-md-10">
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong>{{ trans('profile.profile') }}</strong>
            </div>
            <div class="panel-body">
                <h3>{{ trans('profile.welcome', ['name' => Auth::user()->first_name]) }}</h3>
                <p>{{ trans('profile.welcome_info') }}</p>
                <hr />
                <div class="col-sm-10">
                    @if(!empty(Auth::user()->image))
                        <div class="col-sm-2">
                        </div>
                    @endif
            <div class="col-md-10 col-md-offset-1">
                <img src="/avatars/{{ Auth::user()->image }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
                <h2>{{ Auth::user()->first_name }}'s Profile</h2>
                <form enctype="multipart/form-data" action="/profile/avatar" method="POST">
                    <label>Update Profile Image</label>
                    <input type="file" name="image">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="submit" class="pull-right btn btn-sm btn-primary">
                </form>
            </div>
        </div>
    </div>
        </div>
    </div>
@endsection
