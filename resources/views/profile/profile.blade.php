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
                        <h3>{{ trans('profile.welcome', ['name' => Auth::user()->first_name]) }}</h3>
                        <p>{{ trans('profile.welcome_info') }}</p>
                        <hr />
                        <div class="col-sm-10">
                            <div class="col-sm-2">
                                <img src="{{ Auth::user()->image }}" alt="*" />
                            </div>
                            <div class="col-sm-8">
                                <h3>{{ trans('profile.userinfo') }}</h3>
                                <table class="table table-hover">
                                    <tr>
                                        <td width="50%">{{ trans('profile.name') }}</td>
                                        <td width="50%">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ trans('profile.email') }}</td>
                                        <td>{{ Auth::user()->email }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ trans('profile.language') }}</td>
                                        <td>{{ Auth::user()->prefered_language }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ trans('profile.since') }}</td>
                                        <td>{{ Auth::user()->created_at }}</td>
                                    </tr>                                    
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
