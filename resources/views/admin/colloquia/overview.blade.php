 @extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('addColloquium.accept-colloquium') }}</div>
                    <div class="panel-body">
                        <div class="btn-group btn-group-xs pull-right">
                            <a href="{{ url('/admin/colloquia') }}" class="btn btn-{{ is_null($status) ? 'primary' : 'default'}}">{{ trans('') }}</a>
                            <a href="{{ url('/admin/colloquia/2') }}" class="btn btn-{{ $status === '2' ? 'primary' : 'default'}}">Onbeslist</a>
                            <a href="{{ url('/admin/colloquia/0') }}" class="btn btn-{{ $status === '0' ? 'primary' : 'default'}}">Geweigerd</a>
                            <a href="{{ url('/admin/colloquia/1') }}" class="btn btn-{{ $status === '1' ? 'primary' : 'default'}}">Geaccepteerd</a>
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
                                    <td><a href="/admin/colloquia/edit/{{$colloquium->id}}">{{ $colloquium->title }}</a></td>
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
                                        <a href="{{ url('/admin/colloquia/deny/' . $colloquium->id) }}">
                                            <i class="fa fa-ban text-danger"></i>
                                        </a>
                                        <a href="{{ url('/admin/colloquia/approve/' . $colloquium->id) }}">
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