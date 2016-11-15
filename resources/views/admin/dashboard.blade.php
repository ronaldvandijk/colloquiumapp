@extends('layouts.app')

@section('title','Admin Dashboard')

@section('styles')
    <link href="{{ url('/') }}/css/admin.css" rel="stylesheet">
@endsection

@section('content')
    <div id="admin-page" class="container">
        <div class="row">
            <div class="col-sm-6 col-md-4">
                <a href="{{ action('Admin\BuildingController@index') }}" ><div class="panel panel-default panel-admin"><i class="fa fa-building"></i> {{ trans('admin/dashboard.buildings') }}</div></a>
            </div>
            <div class="col-sm-6 col-md-4">
                <a href="{{ action('Admin\CityController@index') }}" ><div class="panel panel-default panel-admin"><i class="fa fa-globe"></i> {{ trans('admin/dashboard.cities') }}</div></a>
            </div>
            <div class="col-sm-6 col-md-4">
                <a href="{{ action('Admin\LocationController@index') }}" ><div class="panel panel-default panel-admin"><i class="fa fa-map-pin"></i> {{ trans('admin/dashboard.locations') }}</div></a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-4">
                <a href="{{ action('Admin\RoomController@index') }}" ><div class="panel panel-default panel-admin"><i class="fa fa-square-o"></i> {{ trans('admin/dashboard.rooms') }}</div></a>
            </div>
            <div class="col-sm-6 col-md-4">
                <a href="{{ action('Admin\ThemeController@index') }}" ><div class="panel panel-default panel-admin"><i class="fa fa-pencil-square"></i> {{ trans('admin/dashboard.themes') }}</div></a>
            </div>
            <div class="col-sm-6 col-md-4">
                <a href="{{ action('Admin\UsersController@overview') }}" ><div class="panel panel-default panel-admin"><i class="fa fa-users"></i> {{ trans('admin/dashboard.users') }}</div></a>
            </div>
        </div>
    </div>
@endsection