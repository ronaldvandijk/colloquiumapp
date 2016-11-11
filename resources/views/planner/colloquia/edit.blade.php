@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-push-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <b>{{ trans('addColloquium.edit-colloquium') }} {{ $colloquium->title }}</b></div>
                    <div class="panel-body">
                        <form method="POST" action="/planner/colloquia/update/{{ $colloquium->id }}">
                            {{ csrf_field() }}
                            @if (Auth::user()->hasRole("administrator"))
                                <div class="form-group">
                                    <label>{{ trans('addColloquium.title') }}</label>
                                    <input type="text" class="form-control" name="title"
                                           value="{{ $colloquium->title }}">
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('addColloquium.description') }}</label>
                                    <textarea name="description" class="form-control" rows="3"
                                              style="max-width: 100%;">{{ $colloquium->description }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('addColloquium.type') }}</label>
                                    <select class="form-control" name="type">
                                        @foreach ($types as $type)
                                            @if ($colloquium->type_id == $type->id)
                                                <option value="{{ $colloquium->id }}"
                                                        selected>{{ $colloquium->name }}</option>
                                            @else
                                                <option value="{{ $colloquium->id }}">{{ $colloquium->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('addColloquium.theme') }}</label>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="option1">
                                            Lorem
                                        </label>
                                        <label>
                                            <input type="checkbox" value="option1">
                                            Ipsum
                                        </label>
                                        <label>
                                            <input type="checkbox" value="option1">
                                            Dolor
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('addColloquium.email') }}</label>
                                    <input type="email" class="form-control" name="email">
                                </div>
                        <!-- {{ trans('addColloquium.email') }}<a class="btn btn-default">{{ trans('addColloquium.composeEmailBtn') }}</a><br/>-->
                            @endif
                            <div class="form-group">
                                <label>{{ trans('addColloquium.date') }}</label>
                                <input type="date" class="form-control" name="startDate" value="{{ $startDate }}">
                            </div>
                            <div class="form-group form-inline">
                                <label>{{ trans('addColloquium.time') }}</label>
                                <input type="time" class="form-control"
                                       name="timeStart" value="{{ $startTime }}"> {{ trans('addColloquium.untill') }} <input type="time"
                                                                                                    class="form-control"
                                                                                                    name="timeEnd" value="{{ $endTime }}">
                            </div>
                            <div class="form-group form-inline">
                                <label>{{ trans('addColloquium.location') }}</label>
                                <select class="form-control" name="room_id">
                                    @foreach ($rooms as $room)
                                        @if ($room->id == $colloquium->room_id)
                                            <option value="{{ $room->id }}" selected>{{ $room->building->location->city->name }}, {{ $room->building->location->name }}, {{ $room->building->abbreviation }} {{ $room->name }}</option>
                                        @else
                                            <option value="{{ $room->id }}">{{ $room->building->location->city->name }}, {{ $room->building->location->name }}, {{ $room->building->abbreviation }} {{ $room->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <button class="btn btn-default pull-right"
                                    type="confirm"> {{trans('addColloquium.confirm')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
