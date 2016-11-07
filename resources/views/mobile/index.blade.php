@extends('layouts.mobile')

@section('content')
    @for ($i=0; $i < 5 ; $i++)
        <div class="panel panel-default">
            <div class="panel-body schedule-item" data-toggle="modal" data-target="#schedule-item-presentations">
                <div class="row">
                    <div class="col-xs-4">
                        <div class="well">
                            <h3>TUE</h3>
                        </div>
                    </div>
                    <div class="col-xs-8">
                        <h4>NOV 01 2016 <span class="label label-default pull-right">2 Events</span></h4>
                        <p>
                            Titel van de presentatie
                        </p>
                        <p>
                            Naam van de presentatie
                        </p>
                    </div>
                </div>
            </div>
        </div>
    @endfor
@endsection

<div class="modal fade" id="schedule-item-presentations" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tuesday November 01 2016</h4>
      </div>
      <div class="modal-body">
        @for ($i=0; $i < 2 ; $i++)
            <div class="panel panel-default">
                <div class="panel-body">
                    <h4><b>Titel van de presentatie</b> <a href="mobile/details" class="btn btn-xs btn-primary pull-right">Details</a></h4>
                    <div class="deets">
                        <p>5:00 - 16:30</p>
                        <p class="pull-right">N/A206</p>
                    </div>
                </div>
            </div>
        @endfor
      </div>
    </div>
  </div>
</div>
