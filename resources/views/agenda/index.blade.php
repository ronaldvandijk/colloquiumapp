@extends('layouts.app')

@section('styles')
    <link href="/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection

@section('title','Agenda')

@section('content')

    <div class="container-fluid">

        <form action="{{url('/')}}/search" method="POST">
            {{ csrf_field() }}
            <div>
                <div class="col-sx-12 col-sm-3 input-group pull-left" style="margin: 0 0 5px 0">

                    <select class="selectpicker" data-selected-text-format="count > 1" Title="Locaties" name="Locations" multiple>
                       @foreach($locations as $location)
                           <option>{{ $location->name }}</option>
                       @endforeach
                    </select>

                    <!-- Date Picker -->
                    <div id="sandbox-container">
                        <input type="text" data-provide="datepicker" name="Date" placeholder="Datum" class="form-control">
                    </div>
                </div>
                <div class="input-group col-xs-12 col-sm-9">

                    <input type="text" name="Searchbar"  class=" form-control " placeholder="Search for...">
                    <span class="input-group-btn">
                        <button class="btn btn-default btn-primary" type="submit"><i class="fa fa-search" aria-hidden="true"></i> Search</button>
                    </span>
                </div>
            </div>
        </form>

        @foreach($colloquiumCollection as $colloquiumCollectionDate => $colloquiums)
            <div style="cursor: pointer" class="panel panel-default" data-toggle="modal" data-target="#colloquiumDate-{{ format('d-m-Y', $colloquiumCollectionDate) }}">
                <div class="panel-body schedule-item">
                    <div class="row">
                        <div class="col-xs-2    ">
                            <h4><b>{{ strtoupper(format('D', $colloquiumCollectionDate)) }}</b></h4>
                        </div>
                        <div class="col-xs-10">
                            <h4>{{ format('j M Y', $colloquiumCollectionDate) }}
                                @if ($colloquiums->count() > 1)
                                    <span class="label label-default pull-right">{{ $colloquiums->count() }} {{ trans('agenda.events') }}</span>
                                @else
                                    <span class="label label-default pull-right">{{ $colloquiums->count() }} {{ trans('agenda.event') }}</span>
                                @endif
                            </h4>
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

@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
    <script> $('#sandbox-container input').datepicker({ format: 'dd/mm/yyyy' });</script>
@endsection
