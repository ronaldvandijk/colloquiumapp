@extends('layouts.panel',[
    'title' => trans('admin/location.list_title'),
    'btnUrl' => url('/admin/locations/create'),
    'btnText' => '<i></i> ' . trans('admin/location.create_title')
])

@section('title','Admin - ' . trans('admin/location.list_title'))

@section('panel-body')
    <table class="table">
        <thead>
        <tr>
            <th>{{ trans('admin/location.name') }}</th>
            <th>{{ trans('admin/location.city') }}</th>
            <th>{{ trans('admin/location.buildings_amount') }}</th>
            <th style="width: 1%;">{{ trans('admin/general.edit') }}</th>
            <th style="width: 1%;">{{ trans('admin/general.delete') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($locations as $location)
            <tr style="margin-top: 50px; margin-bottom: 5em;">
                <td>{{ $location->name }}</td>
                <td>{{ $location->city->name }}</td>
                <td><a href="{{ route("buildings.index") }}">{{ $location->buildings->count() }}</a></td>
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
@endsection
