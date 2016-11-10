@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <a href="{{url('agenda')}}" class="btn btn-primary"><i class="fa fa-chevron-left" aria-hidden="true"></i> {{trans('agenda.back')}}</a>
        <button class="btn btn-success pull-right">{{trans('agenda.interested')}}</button>
        <hr>
        <div class="presentatie-details">
        <h1><b>{{$colloquium->title}}</b></h1>
        <hr>
        <div class="row">
            <div class="col-xs-5">
                <img src="{{$user->image}}" alt="" />
            </div>
            <div class="col-xs-7">
                <p><b>{{trans('agenda.speaker')}}: </b>{{$user->first_name}} {{$user->insertion}} {{$user->last_name}}</p>
                <p><b>{{trans('agenda.type')}}: </b>{{$type->name}}</p>
                <p><b>{{trans('agenda.duration')}}: </b>{{date('j M Y H:i', strtotime($colloquium->start_date))}} - {{date('j M Y H:i', strtotime($colloquium->end_date))}}</p>
                <p><b>{{trans('agenda.room')}}: </b>{{$building->name}}, {{$room->name}}</p>
                <p><b>{{trans('agenda.location')}}: </b>{{$location->name}}, {{$city->name}}</p>
                <p><b>{{trans('agenda.language')}}: </b>{{$language->name}}</p>
                <p><b>{{trans('agenda.interested')}}: </b>{{$interested}} {{trans('agenda.people')}}</p>
            </div>
        </div>
        <h3><b>{{trans('agenda.description')}}</b></h3>
        <p>
            {{$colloquium->description}}
        </p>
        <img src="{{$colloquium->company_image}}" alt="" />
    </div>
    </div>
@endsection

