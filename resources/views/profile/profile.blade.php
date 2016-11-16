@extends('layouts.app')

@section('content')

    <style>
        img {
            max-width: 100%;
            height: auto;
        }

    </style>
    <div class="container">
        <div class="row">
            <div class="row">
            <div class="col-md-12">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
                                <div class="col-sm-4">
                                    <img src="/avatars/{{ Auth::user()->image }}" style="width:150px; height:150px; border-radius:50%; margin-right:25px;">
                                </div>
                                @endif
                                <div class="col-sm-8">
                                    <h3>{{ trans('profile.userinfo') }}</h3>
                                    <table class="table table-hover">
                                        <tr>
                                            <td width="50%">{{ trans('profile.name') }}</td>
                                            <td width="50%">{{ Auth::user()->present()->full_name }}</td>
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
        </div>
    </div>
@endsection
