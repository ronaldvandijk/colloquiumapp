@extends('layouts.app')

@section('title','Admin users overview')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>{{ trans('admin/general.all }} {{ trans('admin/general.users') }}</b></div>

                    <div class="panel-body">
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
                                        <td>{{$user->first_name}}</td>
                                        <td>{{$user->insertion}}</td>
                                        <td>{{$user->last_name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td><a href="/admin/user/edit/{{$user->id}}" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i> Bewerken</a></td>
                                        <td><a href="/admin/user/delete/{{$user->id}}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Verwijderen</a></td>
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
