@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <b>{{ trans('admin/building/create.buildings-capt') }}</b>
                        <div class="pull-right">
                            <a href="/admin/building/create" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>{{ trans('admin/building/create.addbuilding-capt') }}</a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>{{trans('admin/building/create.name-capt')}}</th>
                                <th>{{trans('admin/building/create.building-capt') }}</th>
                                <th>{{trans('admin/building/create.city-capt')}}</th>
                                <th>{{trans('admin/building/create.abbreviation-capt')}}</th>
                                <th>{{trans('admin/building/create.edit-capt')}}</th>
                                <th>{{trans('admin/building/create.delete-capt')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($buildings as $building)
                                <tr style="margin-top: 50px; margin-bottom: 5em;">
                                    <td>{{ $building->name }}</td>
                                    <td>{{ $building->location->name }}</td>
                                    <td>{{ $building->location->city->name }}</td>
                                    <td>{{ $building->abbreviation }}</td>
                                    <td><a href="/admin/buildings/{{$building->id}}/edit" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i> {{trans('admin/building/create.edit-capt')}}</a></td>
                                    <td>
                                        <form method="post" action="/admin/building/{{$building->id}}">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> {{ trans('common.delete') }}</button>
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
