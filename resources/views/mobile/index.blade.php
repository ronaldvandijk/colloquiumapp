@extends('layouts.mobile')

@section('content')
    @foreach($colloquiumDates as $date => $colloquiums)
        <div class="panel panel-default">
            <div class="panel-body schedule-item" data-toggle="modal" data-target="#colloquiumDate-{{$date}}">
                <div class="row">
                    <div class="col-xs-4">
                        <div class="well">
                            <h3>{{strtoupper(date('D', strtotime($date)))}}</h3>
                        </div>
                    </div>
                    <div class="col-xs-8">
                        <h4>{{date('j M Y', strtotime($date))}} <span class="label label-default pull-right">{{count($colloquiums)}} Events</span></h4>
                        @foreach($colloquiums as $colloquium)
                            <p>{{$colloquium->title}}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection

@foreach ($colloquiumDates as $date => $colloquiums)
    <div class="modal fade" id="colloquiumDate-{{$date}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">{{$date}}</h4>
          </div>
          <div class="modal-body">
            @foreach ($colloquiums as $colloquium)
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h4><b>{{$colloquium->title}}</b> <p class="pull-right">{{$colloquium->name}}</p></h4>
                        <div class="deets">
                            <p>{{date('H:i', strtotime($colloquium->start_date))}} - {{date('H:i', strtotime($colloquium->end_date))}}</p>
                            <a href="mobile/details/{{$colloquium->id}}" class="btn btn-sm btn-primary pull-right">Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
@endforeach