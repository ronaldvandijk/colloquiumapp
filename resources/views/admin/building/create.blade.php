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
        <label>{{trans('admin/building/create.name-capt')}}:</label><input name="name" />
        <label>{{trans('admin/building/create.location-capt')}}: </label>
        <select name="location_id">
            @foreach($locations as $location)
                <option value="{{ $location->id }}">{{ $location->name }}</option>
            @endforeach
        </select>
        <label>{{trans('admin/building/create.abbreviation-capt') }}: </label><input type="text" name="abbreviation">
        <button type="submit" class="btn btn-default btn-primary">{{ trans('admin/building/create.confirm') }}</button>
    </form>
    @if($errors)
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
@endsection
