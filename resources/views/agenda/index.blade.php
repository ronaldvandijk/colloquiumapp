@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        @foreach($colloquiumDates as $date => $colloquiums)
            <div class="panel panel-default">
                <div class="panel-body schedule-item" data-toggle="modal" data-target="#colloquiumDate-{{$date}}">
                    <div class="row">
                        <div class="col-xs-2    ">
                            <h4><b>{{date('D', strtotime($date))}}</b></h4>
                        </div>
                        <div class="col-xs-10">
                            <h4>{{date('j M Y', strtotime($date))}} <span class="label label-default pull-right">{{count($colloquiums)}} {{trans('agenda.events')}}</span></h4>
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
                <h4 class="modal-title" id="myModalLabel">{{date('d M Y', strtotime($date))}}</h4>
              </div>
              <div class="modal-body">
                @foreach ($colloquiums as $colloquium)
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h4><b>{{$colloquium->title}}</b> <span class="pull-right"></span></h4>
                            <div class="deets">
                                <p>
                                    <b>{{trans('agenda.room')}}: </b>{{$colloquium->name}}
                                    <br>
                                    <b>{{trans('agenda.time')}}: </b>{{date('H:i', strtotime($colloquium->start_date))}} - {{date('H:i', strtotime($colloquium->end_date))}}
                                    <a href="agenda/details/{{$colloquium->id}}" class="btn btn-sm btn-primary pull-right">Details</a>
                                </p>
                                
                            </div>
                        </div>
                    </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
    @endforeach
    </div>
@show