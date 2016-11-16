@extends('layouts.app')

@section('content')
    <div class="container-fluid">  
        <div class="row">
        <div class="col-md-2">
            @include('user/profileSidebar')
        </div>
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-sm-3">
                            <h4>{{ trans('profile.avatar_edit') }}</h4>
                            <strong>{{ trans('profile.avatar_current') }}</strong><br />
                            <img src="{{ Auth::user()->image }}" alt="*" />
                            <hr />
                            <form action="/profile/avatar" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="file" name="avatar" id="avatar" required />
                                    @if ($errors->has('avatar'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('avatar') }}</strong>
                                        </span>
                                    @endif                       
                                </div>                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
