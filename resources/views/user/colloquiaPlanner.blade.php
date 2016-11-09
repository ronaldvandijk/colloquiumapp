@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Colloquia accepteren</div>
                    <div class="panel-body">
                        <div class="btn-group btn-group-xs pull-right">
                            <a href="{{ url('/') }}/planner/colloquium" class="btn btn-default">Alles</a>
                            <a href="{{ url('/') }}/planner/colloquium?approval=0" class="btn btn-default">Onbeslist</a>
                            <a href="{{ url('/') }}/planner/colloquium?approval=1" class="btn btn-default">Geweigerd</a>
                            <a href="{{ url('/') }}/planner/colloquium?approval=2" class="btn btn-default">Geaccepteerd</a>
                        </div>
                        <table class="table table-responsive table-striped">
                            <thead>
                            <th>Titel</th>
                            <th>Auteur</th>
                            <th>Type</th>
                            <th>Kamer</th>
                            <th>Datum</th>
                            <th>t/m</th>
                            <th>Status</th>
                            </thead>
                            <tbody>
                            @foreach($colloquia as $colloquium)
                                <tr>
                                    <td>{{ $colloquium->title }}</td>
                                    <td>
                                        <a href="{{ url('/') }}/user/{{ $colloquium->user_id }}">{{ DB::table('users')->where('id', $colloquium->user_id)->value('last_name') }}</a>
                                    </td>
                                    <td>
                                        <a href="{{ url('/') }}/room/{{ $colloquium->room_id }}">{{ DB::table('rooms')->where('id', $colloquium->room_id)->value('name') }}</a>
                                    </td>
                                    <td>
                                        <a href="{{ url('/') }}/type/{{ $colloquium->type_id }}">{{ DB::table('colloquium_types')->where('id', $colloquium->type_id)->value('name') }}</a>
                                    </td>
                                    <td>{{ $colloquium->start_date }}</td>
                                    <td>{{ $colloquium->end_date }}</td>
                                    <td>
                                        <a href="{{ url('/') }}/planner/colloquium/update?id={{ $colloquium->id }}&approval=1">
                                            <i class="fa fa-ban text-danger"></i>
                                        </a>
                                        <a href="{{ url('/') }}/planner/colloquium/update?id={{ $colloquium->id }}&approval=2">
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