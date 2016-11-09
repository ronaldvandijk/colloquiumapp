@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>{{ trans('admin/location.list_title') }}</b></div>

                    <div class="panel-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>{{ trans('admin/location.id') }}</th>
                                <th>{{ trans('admin/location.name') }}</th>
                                <th>{{ trans('admin/location.city') }}</th>
                                <th>{{ trans('admin/general.edit') }}</th>
                                <th>{{ trans('admin/general.delete') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($locations as $location)
                                <tr style="margin-top: 50px; margin-bottom: 5em;">
                                    <td>{{ $location->id }}</td>
                                    <td>{{ $location->name }}</td>
                                    <td>{{ $location->city->name }}</td>
                                    <td><a href="/admin/location/edit/{{$location->id}}" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i> {{ trans('admin/general.edit') }}</a></td>
                                    <td><a href="/admin/location/delete/{{$location->id}}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> {{ trans('admin/general.delete') }}</a></td>
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

