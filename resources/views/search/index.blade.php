@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <a style="margin-bottom: 15px;" href="{{ url('agenda') }}" class="btn btn-primary"><i class="fa fa-chevron-left" aria-hidden="true"></i> {{ trans('agenda.back') }}</a>
            @foreach ($colloquiumCollectionDate as $colloquium)
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h4><b>{{ $colloquium['title'] }}</b> <span class="pull-right"></span></h4>
                        <div class="deets">
                            <p>
                                <b>{{ trans('agenda.room') }}: </b>{{ $colloquium['title'] }}
                                <br>
                                <b>{{ trans('agenda.date') }}: </b>
                                {{ format('j M Y', $colloquium['start_date']) }} - {{ format('H:i', $colloquium['start_date']) }} - {{ format('H:i', $colloquium['end_date']) }}
                                <a href="{{ url('agenda/show', $colloquium['id']) }}" class="btn btn-sm btn-primary pull-right">Details</a>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
    </div>
@endsection