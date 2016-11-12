@extends('layouts.app')

@section('styles')
    <link href="{{ url('/') }}/css/admin.css" rel="stylesheet">
@endsection

@section('content')
    <div id="admin-page" class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <a href="{{-- action('Admin\LocationController@index') --}}" ><div class="panel panel-default panel-admin"><i class="fa fa-globe"></i> {{ trans('admin/dashboard.locations') }}</div></a>
            </div>
            <div class="col-sm-12 col-md-6">
                <a href="{{ action('Admin\UsersController@index') }}" ><div class="panel panel-default panel-admin"><i class="fa fa-users"></i> {{ trans('admin/dashboard.users') }}</div></a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <a href="{{ action('Admin\ThemeController@index') }}" ><div class="panel panel-default panel-admin"><i class="fa fa-pencil-square"></i> {{ trans('admin/dashboard.themes') }}</div></a>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div><i class="fa fa-rss"></i> {{ trans('admin/dashboard.activity_stream') }}</div>
                    </div>
                    <div class="panel-body">
                         {{-- TODO: Activity Stream --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection