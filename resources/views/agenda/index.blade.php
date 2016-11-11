@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        @foreach($colloquiumCollection as $colloquiumCollectionDate => $colloquiums)
            <div class="panel panel-default" data-toggle="modal" data-target="#colloquiumDate-{{ format('d-m-Y', $colloquiumCollectionDate) }}">
                <div class="panel-body schedule-item">
                    <div class="row">
                        <div class="col-xs-2    ">
                            <h4><b>{{ strtoupper(format('D', $colloquiumCollectionDate)) }}</b></h4>
                        </div>
                        <div class="col-xs-10">
                            <h4>{{ format('j M Y', $colloquiumCollectionDate) }} <span class="label label-default pull-right">{{ $colloquiums->count() }} {{ trans('agenda.events') }}</span></h4>
                        </div>
                    </div>
                </div>
                <div class="hidden-xs">
                    <table style="margin-bottom: 0;" class="table">
                        @foreach ($colloquiums as $colloquim)
                            <tr style="background: #fdfdfd">
                                <td style="width: 33%;">{{ $colloquim->title }}</td>
                                <td style="width: 33%;">{{ $colloquim->building_name }}, {{ $colloquim->room_name }}</td>
                                <td style="width: 33%;">{{ format('H:i', $colloquim->start_date) }} - {{ format('H:i', $colloquim->end_date) }}</td>
                            </tr>   
                        @endforeach
                    </table>
                </div>
            </div>
        @endforeach
    @endsection

    @foreach ($colloquiumCollection as $colloquiums => $colloquiumCollectionDate)
        <div class="modal fade" id="colloquiumDate-{{ format('d-m-Y', $colloquiums) }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">{{ format('j M Y', $colloquiums) }}</h4>
              </div>
              <div class="modal-body">
                @foreach ($colloquiumCollectionDate as $colloquium)
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h4><b>{{ $colloquium->title }}</b> <span class="pull-right"></span></h4>
                            <div class="deets">
                                <p>
                                    <b>{{ trans('agenda.location') }}: </b>{{ $colloquium->building_name }}, {{ $colloquium->room_name }}
                                    <br>
                                    <b>{{ trans('agenda.time') }}: </b>
                                    {{ format('H:i', $colloquium->start_date) }} - {{ format('H:i', $colloquium->end_date) }}
                                    <a href="{{ url('agenda/show', $colloquium->id) }}" class="btn btn-sm btn-primary pull-right">Details</a>
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
