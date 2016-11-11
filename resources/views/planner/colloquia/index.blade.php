@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Colloquia accepteren</div>
                    <div class="panel-body">
                        <div class="btn-group btn-group-xs pull-right">
                            <a href="{{ url('/planner/colloquia') }}" class="btn btn-default">Alles</a>
                            <a href="{{ url('/planner/colloquia/null') }}" class="btn btn-default">Onbeslist</a>
                            <a href="{{ url('/planner/colloquia/0') }}" class="btn btn-default">Geweigerd</a>
                            <a href="{{ url('/planner/colloquia/1') }}" class="btn btn-default">Geaccepteerd</a>
                        </div>
                        <table class="table table-responsive table-striped">
                            <thead>
                            <th>Titel</th>
                            <th>Spreker</th>
                            <th>Locatie</th>
                            <th>Type</th>
                            <th>Datum</th>
                            <th>t/m</th>
                            <th>Status</th>
                            </thead>
                            <tbody>
                            @foreach($colloquia as $colloquium)
                                <tr>
                                    <td>{{ $colloquium->title }}</td>
                                    <td>{{ $colloquium->user->last_name }}, {{ $colloquium->user->first_name }} {{ $colloquium->user->insertion }}</td>
                                    <td>{{ $colloquium->room->building->location->city->name }}, {{ $colloquium->room->building->location->name }}, {{ $colloquium->room->building->abbreviation }} {{ $colloquium->room->name }}</td>
                                    <td>{{ $colloquium->type->name }}</td>
                                    <td>{{ $colloquium->start_date }}</td>
                                    <td>{{ $colloquium->end_date }}</td>
                                    <td>
                                        <a href="{{ url('/planner/colloquium/approve/' . $colloquium->id . '/0') }}">
                                            <i class="fa fa-ban text-danger"></i>
                                        </a>
                                        <a href="{{ url('/planner/colloquium/approve/' . $colloquium->id . '/1') }}">
                                            <i class="fa fa-check text-success"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection