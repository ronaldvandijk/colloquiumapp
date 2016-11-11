@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <b> {{ trans('admin/building/create.addbuilding-capt') }}</b>
                    </div>
                    <div class="panel-body">
                        <form action="/admin/building" method="POST">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
