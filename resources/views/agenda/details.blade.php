@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <a href="{{url('agenda')}}" class="btn btn-primary"><i class="fa fa-chevron-left" aria-hidden="true"></i> Back</a>
        <button class="btn btn-success pull-right">Interesse</button>
        <hr>
        <div class="presentatie-details">
        <h1><b>{{$colloquium->title}}</b></h1>
        <hr>
        <div class="row">
            <div class="col-xs-5">
                <img src="{{$user->image}}" alt="" />
            </div>
            <div class="col-xs-7">
                <p><b>Speaker: </b>{{$user->first_name}} {{$user->insertion}} {{$user->last_name}}</p>
                <p><b>Type: </b>{{$type->name}}</p>
                <p><b>Duration: </b>{{date('j M Y H:i', strtotime($colloquium->start_date))}} - {{date('j M Y H:i', strtotime($colloquium->end_date))}}</p>
                <p><b>Room: </b>{{$room->name}}</p>
                <p><b>Location: </b>{{$location->name}}, {{$city->name}}</p>
                <p><b>Language: </b>{{$language->name}}</p>
                <p><b>Interested: </b>{{$interested}} People</p>
            </div>
        </div>
        <h3><b>Description</b></h3>
        <p>
            {{$colloquium->description}}
        </p>
        <img src="{{$colloquium->company_image}}" alt="" />
    </div>
    </div>
@endsection

