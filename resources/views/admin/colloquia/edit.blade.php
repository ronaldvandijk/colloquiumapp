@extends('layouts.app')

@section('title', trans('admin/colloquia.edit_colloquia'))

@section('scripts')
    <script src="https://unpkg.com/axios/dist/axios.min.js" async></script>
    <script src="{{ url('/js/colloquia_locations.js') }}" async></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" rel="stylesheet">

    <script>
        $.fn.datepicker.defaults.format = "yyyy-mm-dd";
    </script>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-push-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>{{ trans('addColloquium.edit-colloquium') }}</b></div>
                    <div class="panel-body">
                    <form method="POST" action="{{ url('/planner/colloquia/update/' . $colloquium->id) }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>{{ trans('addColloquium.title') }}</label>
                            <input type="text" class="form-control" name="title" value="{{ $colloquium->title }}">
                        </div>
                        <div class="form-group">
                            <label>{{ trans('addColloquium.description') }}</label>
                            <textarea name="description" class="form-control" rows="3">{{ $colloquium->description }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>{{ trans('addColloquium.type') }}</label>
                            <select class="form-control" name="type">
                                @foreach($types as $type)
                                    <option value="{{ $type->id }}" {{ $colloquium->type_id == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('addColloquium.theme') }}</label>
                            <div class="checkbox">
                                @foreach($themes as $theme)
                                    <label>
                                        <input type="checkbox" value="{{ $theme->id }}" {{ $colloquium->hasTheme($theme) ? 'checked' : '' }}>
                                        {{ $theme->name }}
                                    </label>
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('addColloquium.email') }}</label>
                            <input type="email" class="form-control" name="email">
                        </div>
                        <div class="form-group">
                            <label>{{ trans('addColloquium.date') }}</label>
                            <input type="text" class="form-control datepick" data-provide="datepicker"  name="date_start" @if(!empty($colloquium->start_date)) value="{{ explode(' ', $colloquium->start_date)[0] }}" @endif>
                        </div>
                        <div class="form-group form-inline">
                            <label>{{ trans('addColloquium.time') }}</label>
                            <input type="time" class="form-control" name="time_start" @if(!empty($colloquium->start_date)) value="{{ explode(' ', $colloquium->start_date)[1] }}" @endif> {{ trans('addColloquium.untill') }} <input type="time" class="form-control" name="time_end" @if(!empty($colloquium->end_date)) value="{{ explode(' ', $colloquium->end_date)[1] }}" @endif>
                        </div>
                        <div class="form-group form-inline">

                            {{--If a room isn't set, show some cities and have AJAX handle the rest :) xoxox Sander --}}
                            @if($colloquium->room_id == NULL)
                                <select class="form-control" name="city_id" id="cities">
                                    @foreach($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach
                                </select>
                                <select class="form-control" name="building_id" id="buildings">
                                    @if(count($cities) == 1)
                                        @foreach($buildings as $building)
                                            <option value="{{ $building->id }}">{{ $building->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                <select class="form-control" name="room_id" id="rooms">
                                </select>
                            @else
                                <label>{{ trans('addColloquium.location') }}</label>
                                <select class="form-control" name="city_id" id="cities">
                                    @foreach($cities as $city)
                                        <option value="{{ $city->id }}" {{ $colloquium->room->building->location->city->id == $city->id ? 'selected' : '' }}>{{ $city->name }}</option>
                                    @endforeach
                                </select>
                                <select class="form-control" name="building_id" id="buildings">
                                    @foreach($buildings as $building)
                                        <option value="{{ $building->id }}" {{ $colloquium->room->building->id == $building->id ? 'selected' : '' }}> {{ $building->name }}</option>
                                    @endforeach
                                </select>
                                <select class="form-control" name="room_id" id="rooms">
                                    @foreach($rooms as $room)
                                        <option value="{{ $room->id }}" {{ $colloquium->room_id == $room->id ? 'selected' : '' }}>{{ $room->name }}</option>
                                    @endforeach
                                <select>
                            @endif
                            <div id="loading" style="display: none;">
                                <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
                            </div>
                        </div>
                        <button class="btn btn-success pull-right" type="submit" id="btn__submit"><i class="fa fa-save"></i> {{trans('addColloquium.confirm')}}</button>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection
