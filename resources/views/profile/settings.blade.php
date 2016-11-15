@extends('layouts.app')

@section('content')
    <div class="container-fluid">  
        <div class="row">
            @include('profile.profileSidebar')
            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong>{{ trans('profile.profile') }}</strong>
                    </div>
                    <div class="panel-body">
                        <div class="col-sm-10">
                            <div class="col-sm-2">
                                <h4>{{ trans('profile.avatar') }}</h4>
                                <img src="{{ Auth::user()->image }}" alt="*" /><br />
                                <a href="/profile/avatar" target="_self" />{{ trans('profile.avatar_edit') }}</a>
                            </div>
                            <div class="col-sm-7">
                                <form action="/profile/settings" method="post">
                                    {{ csrf_field() }}
                                    <h4>{{ trans('profile.userinfo') }}</h4>
                                    <div class="form-group">
                                        <label for="first_name">{{ trans('profile.first_name') }}</label>
                                        <input type="text" class="form-control" name="first_name" value="{{ Auth::user()->first_name }}" required />

                                        @if ($errors->has('first_name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('first_name') }}</strong>
                                            </span>
                                        @endif                       
                                    </div>

                                    <div class="form-group">
                                        <label for="last_name">{{ trans('profile.last_name') }}</label>
                                        <input type="text" class="form-control" name="last_name" value="{{ Auth::user()->last_name }}" required />

                                        @if ($errors->has('last_name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('last_name') }}</strong>
                                            </span>
                                        @endif      
                                    </div>          

                                    <div class="form-group">
                                        <label for="email">{{ trans('profile.email') }}</label>
                                        <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" disabled />
                                    </div>

                                    <div class="form-group">
                                        <label for="language">{{ trans('profile.language') }}</label>
                                        <select name="prefered_language" class="form-control">
                                            @foreach ($languages as $language)
                                                <option value="{{$language->directory}}"{{ Auth::user()->prefered_language == $language->directory ? " selected" : "" }}>{{$language->native}}</option>
                                            @endforeach
                                        </select>
                                    </div>                                        
                                    <hr />
                                    <h4>{{ trans('profile.change_password') }}</h4>
                                    <p>{{ trans('profile.change_password_what') }}</p>
                                    <div class="form-group">
                                        <label for="new_password">{{ trans('profile.new_password') }}</label>
                                        <input type="password" class="form-control" name="new_password" />
                                    </div>
                                    <div class="form-group">
                                        <label for="new_password_confirm">{{ trans('profile.new_password_confirm') }}</label>
                                        <input type="password" class="form-control" name="new_password_confirmation" />
                                    </div>                                                    
                                    <hr />
                                    <div class="form-group">
                                        <label for="current_pw">{{ trans('profile.current_pw') }}</label>
                                        <input type="password" class="form-control" name="current_pw" required />
                                        @if ($errors->has('current_pw'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('current_pw') }}</strong>
                                            </span>
                                        @endif    
                                    </div>                                        
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">
                                            {{ trans('profile.save') }}
                                        </button>
                                    </div>                      
                                </form>
                            </div>                       
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
