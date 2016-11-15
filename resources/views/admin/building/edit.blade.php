@extends('layouts.panel', [
    'title' => trans('admin/building/create.edit-capt'),
    'btnText' => trans('common.overview'),
    'btnUrl' => url('/admin/buildings'),
    'btnType' => 'default',
])

@section('title','Admin - ' . trans('admin/building/create.edit-capt'))

@section('panel-body')
    <form action="/admin/buildings/{{ $building->id }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <label>{{trans('admin/building/create.name-capt')}}: </label><input name="name" value="{{ $building->name }}" />
        <label>{{trans('admin/building/create.location-capt')}}: </label>
        <select name="location_id">
            @foreach($locations as $location)
                <option value="{{ $location->id }}" @if($location->id == $building->location_id ) selected @endif>{{ $location->name }}</option>
            @endforeach
        </select>
        <label>{{trans('admin/building/create.abbreviation-capt')}}: </label><input type="text" name="abbreviation" value="{{ $building->abbreviation }}">
        <button type="submit" class="btn btn-default btn-primary">{{ trans('common.update') }}</button>
    </form>
    @if($errors)
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
@endsection
