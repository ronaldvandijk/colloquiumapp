@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <b>Colloquia</b>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                                <th>Titel</th>
                                <th>Startdatum</th>
                                <th>Type</th>
                                <th>Taal</th>
                                <th>Status</th>
                                <th>EDIT</th>
                            </thead>
                            <tbody>
                                @foreach($colloquia as $colloquium)
                                    <tr>
                                        <td>{{ $colloquium->title }}</td>
                                        <td>{{ $colloquium->start_date }}</td>
                                        <td>{{ $colloquium->type()->first()->name }}</td>
                                        <td>{{ $colloquium->language()->first()->name }}</td>
                                        <td>{{ $colloquium->approval }}</td>
                                        <td><a href="/mycolloquia/edit/{{ $colloquium->id }}" class="btn btn-success"><i class="fa fa-pencil"></i> {{ trans('common.edit') }}</a></td>
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