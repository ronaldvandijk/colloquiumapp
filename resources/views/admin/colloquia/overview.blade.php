 @extends('layouts.app')

@section('title','Admin colloquia overview')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('addColloquium.accept-colloquium') }}</div>
                    <div class="panel-body">
                        <div class="btn-group btn-group-xs pull-right">
                            <a href="{{ url('/planner/colloquia') }}" class="btn btn-{{ is_null($status) ? 'primary' : 'default'}}">{{ trans('admin/colloquia.all_col') }}</a>
                            <a href="{{ url('/planner/colloquia/2') }}" class="btn btn-{{ $status === '2' ? 'primary' : 'default'}}">{{ trans('admin/colloquia.pending_col') }}</a>
                            <a href="{{ url('/planner/colloquia/0') }}" class="btn btn-{{ $status === '0' ? 'primary' : 'default'}}">{{ trans('admin/colloquia.refused_col') }}</a>
                            <a href="{{ url('/planner/colloquia/1') }}" class="btn btn-{{ $status === '1' ? 'primary' : 'default'}}">{{ trans('admin/colloquia.approved_col') }}</a>
                        </div>
                        <table class="table table-responsive table-striped">
                            <thead>
                            <th>{{ trans('addColloquium.title') }}</th>
                            <th>{{ trans('addColloquium.speaker') }}</th>
                            <th>{{ trans('addColloquium.location') }}</th>
                            <th>{{ trans('addColloquium.type') }}</th>
                            <th>{{ trans('addColloquium.date') }}</th>
                            <th>{{ trans('addColloquium.untill') }}</th>
                            <th>Status</th>
                            </thead>
                            <tbody>
                            @foreach($colloquia as $colloquium)
                                <tr>
                                    <td><a href="/planner/colloquia/edit/{{$colloquium->id}}">{{ $colloquium->title }}</a></td>
                                    <td>{{ $colloquium->user->present()->full_name() }}</td>
                                    <td>
                                        @if($colloquium->room_id != null)
                                            {{ $colloquium->room->building->location->city->name }},
                                            {{ $colloquium->room->building->location->name }},
                                            {{ $colloquium->room->building->abbreviation }}
                                            {{ $colloquium->room->name }}
                                        @endif
                                    </td>                                    <td>{{ $colloquium->type->name }}</td>
                                    <td>{{ $colloquium->start_date }}</td>
                                    <td>{{ $colloquium->end_date }}</td>
                                    <td>
                                        @if (is_null($colloquium->approved) || $colloquium->approved)
                                        <a href="{{ url('/planner/colloquia/deny/' . $colloquium->id) }}" class="btn btn-danger">
                                            <i class="fa fa-ban"></i>
                                        </a>
                                        @endif
                                        @if (is_null($colloquium->approved) || !$colloquium->approved)
                                        <a href="{{ url('/planner/colloquia/approve/' . $colloquium->id) }}" class="btn btn-success">
                                            <i class="fa fa-check"></i>
                                        </a>
                                            @endif
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