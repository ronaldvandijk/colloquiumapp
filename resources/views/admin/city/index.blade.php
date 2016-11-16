@extends('layouts.panel', [
    'title' => trans('admin/city.list_title'),
    'btnUrl' => url('/admin/cities/create'),
    'btnText' => '<i class="fa fa-plus"></i> ' . trans('admin/city.create_title')
])

@section('title','Admin city index')

@section('panel-body')
    <table class="table">
        <thead>
        <tr>
            <th>{{ trans('admin/city.name') }}</th>
            <th>{{ trans('admin/city.locations_amount') }}</th>
            <th style="width: 1%"></th>
            <th style="width: 1%"></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($data as $city)
            <tr style="margin-top: 50px; margin-bottom: 5em;">
                <td>{{ $city->name }}</td>
                <td><a href="{{ route("locations.index") }}">{{ $city->locations->count() }}</a></td>
                <td><a href="/admin/cities/{{ $city->id }}/edit" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i> {{ trans('common.edit') }}</a></td>
                <td style="text-align: right">
                    <form method="post" action="/admin/cities/{{ $city->id }}">
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
@endsection

