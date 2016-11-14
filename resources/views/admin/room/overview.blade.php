@extends('layouts.app')

@section('title','Admin room overview')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                    	@include('layouts.panel_heading', [
                    		'title' => trans('common.rooms'),
                    		'button' => trans('common.modelcreate', ['modelName' => trans('common.room')]),
                    		'url' => url('/admin/room/create'),
                    	])
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
