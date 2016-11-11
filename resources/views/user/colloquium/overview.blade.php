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
                                <th>{{ trans('user/colloquium/edit.title') }}</th>
                                <th>{{ trans('user/colloquium/edit.start_date') }}</th>
                                <th>{{ trans('user/colloquium/edit.start_time') }}</th>
                                <th>{{ trans('user/colloquium/edit.type') }}</th>
                                <th>{{ trans('user/colloquium/edit.language') }}</th>
                                <th>{{ trans('user/colloquium/edit.status') }}</th>
                                <th>{{ trans('common.edit') }}</th>
                            </thead>
                            <tbody>
                                @foreach($colloquia as $colloquium)
                                    <tr>
                                        <td>{{ $colloquium->title }}</td>
                                        <td>{{ explode(" ", $colloquium->start_date)[0] }}</td>
                                        <td>{{ explode(" ", $colloquium->start_date)[1] }}</td>
                                        <td>{{ $colloquium->type()->first()->name }}</td>
                                        <td>{{ $colloquium->language()->first()->name }}</td>
                                        <td>
                                            @if($colloquium->approval === null)
                                                {{ trans('user/colloquium/edit.colloquia_await_approval') }}
                                            @elseif($colloquium->approval == 1)
                                                {{ trans('user/colloquium/edit.colloquia_accepted') }}
                                            @else
                                                {{ trans('user/colloquium/edit.colloquia_not_approved') }}
                                            @endif
                                        </td>
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