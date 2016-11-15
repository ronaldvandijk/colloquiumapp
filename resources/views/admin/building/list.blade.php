@extends('layouts.panel',  [
    'title' => trans('admin/building/create.addbuilding-capt'),
    'btnUrl' => url('/admin/buildings/create'),
    'btnText' => '<i class="fa fa-plus"></i> ' . trans('admin/building/create.addbuilding-capt'),
])

@section('panel-body')
    <table class="table">
        <thead>
        <tr>
            <th>{{trans('admin/building/create.name-capt')}}</th>
            <th>{{trans('admin/building/create.building-capt') }}</th>
            <th>{{trans('admin/building/create.city-capt')}}</th>
            <th>{{trans('admin/building/create.abbreviation-capt')}}</th>
            <th>{{trans('admin/building/create.rooms_amount') }}</th>
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
                <td><a href="/admin/rooms">{{ $building->rooms->count() }}</a></td>
                <td><a href="/admin/buildings/{{$building->id}}/edit" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i> {{trans('admin/building/create.edit-capt')}}</a></td>
                <td>
                    <form method="post" action="/admin/buildings/{{$building->id}}">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> {{ trans('common.delete') }}</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
