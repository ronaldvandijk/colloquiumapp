@extends('layouts.mobile')

@section('content')
    <div class="presentatie-details">
        <h2><b>{{$colloquium->title}}</b></h2>
        <hr>
        <div class="row">
            <div class="col-xs-5">
                <img src="{{$user->image}}" alt="" />
            </div>
            <div class="col-xs-7">
                <p>{{$type->name}}</p>
                <p>{{$colloquium->start_date}}</p>
                <p>{{$room->name}}</p>
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
@endsection
