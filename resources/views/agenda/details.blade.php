@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="presentatie-details">
        <h2><b>{{$colloquium->title}}</b></h2>
        <hr>
        <div class="row">
            <div class="col-xs-5">
                <img src="{{$user->image}}" alt="" />
            </div>
            <div class="col-xs-7">
                <p><b>Speaker: </b>{{$user->first_name}} {{$user->insertion}} {{$user->last_name}}</p>
                <p><b>Type: </b>{{$type->name}}</p>
                <p><b>Time: </b>{{date('j M Y H:i', strtotime($colloquium->start_date))}} - {{date('j M Y H:i', strtotime($colloquium->end_date))}}</p>
                <p><b>Room: </b>{{$room->name}}</p>
                <p><b>Language: </b>{{$room->name}}</p>
                <p>35 Personen</p>
            </div>
        </div>
        <h3><b>Description</b></h3>
        <p>
            {{$colloquium->description}}
        </p>
        <img src="{{$colloquium->company_image}}" alt="" />
        <br>
        <button class="btn btn-primary">Interesse</button>
        <br>
        <br>
    </div>
    </div>
@endsection

