@extends('layouts.panel',  [
    'title' => trans('admin/room.overview_title'),
    'btnUrl' => url('/admin/room/create'),
    'btnText' => '<i class="fa fa-plus"></i> ' . trans('admin/room.create_title'),
])

@section('title','Admin ' . trans('/admin/room.overview_title'))

@section('panel-body')
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
@endsection
