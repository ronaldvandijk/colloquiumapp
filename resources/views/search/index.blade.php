@extends('layouts.app')

@section('content')

    @foreach ($colloquiumCollectionDate as $colloquium)
        <div class="panel panel-default">
            <div class="panel-body">
                <h4><b>{{ $colloquium['title'] }}</b> <span class="pull-right"></span></h4>
                <div class="deets">
                    <p>
                        <b>{{ trans('agenda.room') }}: </b>{{ $colloquium['title'] }}
                        <br>
                        <b>{{ trans('agenda.time') }}: </b>
                        {{ format('H:i', $colloquium['start_date']) }} - {{ format('H:i', $colloquium['end_date']) }}
                        <a href="{{ url('agenda/show', $colloquium['id']) }}" class="btn btn-sm btn-primary pull-right">Details</a>
                    </p>
                </div>
            </div>
        </div>
    @endforeach

@endsection