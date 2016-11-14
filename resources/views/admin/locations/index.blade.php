@extends('layouts.app')

@section('content')
    <div class="container">
        @if(request()->session()->has('success'))
            <div class="alert alert-success">
             {{ request()->session()->get('success') }}
            </div>
        @endif
        @if(request()->session()->has('remove'))
            <div class="alert alert-danger">
                {{ request()->session()->get('remove') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>{{ trans('admin/location.list_title') }}</b></div>
                    <div><a class="btn btn-default" href="{{ url('/admin/locations/create') }}">Add location</a></div>

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
                                    <td><a href="/admin/locations/{{ $location->id }}/edit" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i> {{ trans('admin/general.edit') }}</a></td>
                                    <td>
                                        <form method="post" action="/admin/locations/{{ $location->id }}">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button class="btn btn-danger"
                                                    type="submit">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                                {{ trans('admin/general.delete') }}
                                            </button>
                                        </form>
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
