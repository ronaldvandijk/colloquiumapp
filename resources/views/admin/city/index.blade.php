@extends('layouts.app')

@section('content')
    <div class="container">
        @if(request()->session()->has('custom_error'))
            <div class="alert alert-{{ request()->session()->get('custom_error')['type'] }}">
                {{ request()->session()->get('custom_error')['message'] }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>{{ trans('admin/city.list_title') }}</b></div>
                    <div><a class="btn btn-default" href="{{ url('/admin/cities/create') }}">{{ trans('admin/city.add_city') }}</a></div>
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>{{ trans('common.id') }}</th>
                                <th>{{ trans('admin/city.name') }}</th>
                                <th>{{ trans('admin/city.locations_amount') }}</th>
                                <th>{{ trans('common.edit') }}</th>
                                <th>{{ trans('common.delete') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($data as $city)
                                <tr style="margin-top: 50px; margin-bottom: 5em;">
                                    <td>{{ $city->id }}</td>
                                    <td>{{ $city->name }}</td>
                                    <td><a href="{{ route("locations.index") }}">{{ $city->locations->count() }}</a></td>
                                    <td><a href="/admin/cities/{{ $city->id }}/edit" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i> {{ trans('common.edit') }}</a></td>
                                    <td>
                                        <form method="post" action="/admin/city/{{ $city->id }}">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button class="btn btn-danger"
                                                    type="submit">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                                {{ trans('common.delete') }}
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

