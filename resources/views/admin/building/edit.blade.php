@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <b>Gebouw toevoegen</b>
                    </div>
                    <div class="panel-body">
                        <form action="/admin/building/{{ $building->id }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            <label>Naam: </label><input name="name" value="{{ $building->name }}" />
                            <label>locatie: </label>
                            <select name="location_id">
                                @foreach($locations as $location)
                                    <option value="{{ $location->id }}" @if($location->id == $building->location_id ) selected @endif>{{ $location->name }}</option>
                                @endforeach
                            </select>
                            <label>Abbreviation: </label><input type="text" name="abbreviation" value="{{ $building->abbreviation }}">
                            <button type="submit" class="btn btn-default btn-primary">{{ trans('common.update') }}</button>
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
