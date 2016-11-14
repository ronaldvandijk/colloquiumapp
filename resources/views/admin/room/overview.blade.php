@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
        	<div class="col-md-12">
	            @if(Session::has('message'))
	                <div class="alert alert-info">{{ Session::get('message') }}</div>
	            @endif
            </div>
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                    	<b>{{ trans('common.rooms') }}</b>
                    	<a class="btn btn-default pull-right" href="{{ url('/admin/room/create') }}">{{ trans('common.modelcreate', ['modelName' => trans('common.room')]) }}</a>
                    	<div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>{{ trans('common.name') }}</th>
                                <th>{{ trans('common.capacity') }}</th>
                                <th>{{ trans('common.building') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($data as $room)
                                <tr style="margin-top: 50px; margin-bottom: 5em;">
                                    <td>{{ $room->name }}</td>
                                    <td>{{ $room->capacity }}</td>
                                    <td>{{ $room->building->name }}</td>
                                    <td><a href="/admin/room/edit/{{ $room->id }}" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i> {{ trans('admin/general.edit') }}</a></td>
                                    <td>
                                        <form method="post" action="{{ url('/admin/room/destroy/' . $room->id) }}">
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
