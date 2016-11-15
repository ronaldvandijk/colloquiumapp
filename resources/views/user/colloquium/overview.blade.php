@extends('layouts.app')

@section('title','Overview user')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <b>Colloquia</b>

                        <div class="pull-right">
                            <a href="{{ action('MyColloquiaController@create') }}" class="btn btn-primary">{{ trans('user/colloquium/general.colloquium_request') }}</a>
                        </div>
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
                                        <td>{{ $colloquium->present()->startDate() }}</td>
                                        <td>{{ $colloquium->present()->startTime() }}</td>
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