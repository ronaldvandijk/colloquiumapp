@extends('layouts.panel',  [
    'title' => trans('common.modeloverview', ['modelName' => trans('common.users')]),
    'btnUrl' => url('/admin/users/create'),
    'btnText' => '<i class="fa fa-plus"></i> ' . trans('common.modelcreate', ['modelName' => trans('common.user')])
])

@section('title', trans('common.modeloverview', ['modelName' => trans('common.users')]))

@section('panel-body')
    <table class="table">
        <thead>
            <tr>
                <th>{{ trans('profile.first_name') }}</th>
                <th>{{ trans('profile.insertion') }}</th>
                <th>{{ trans('profile.last_name') }}</th>
                <th>{{ trans('profile.email') }}</th>
                <th>{{ trans('admin.edit') }}</th>
                <th>{{ trans('admin.delete') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr style="margin-top: 50px; margin-bottom: 5em;">
                    <td>{{ $user->first_name }}</td>
                    <td>{{ $user->insertion }}</td>
                    <td>{{ $user->last_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td><a href="/admin/user/edit/{{$user->id}}" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i> Bewerken</a></td>
                    <td><a href="/admin/user/delete/{{$user->id}}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Verwijderen</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
