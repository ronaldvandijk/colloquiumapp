@extends('layouts.app')

@section('title','Admin users overview')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>{{ trans('admin/general.all }} {{ trans('admin/general.users') }}</b></div>

                    <div class="panel-body">
                        @if(request()->session()->has('custom_error'))
                        <div class="alert alert-danger }}">
                            {{ request()->session()->get('custom_error') }}
                        </div>
                        @endif
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Voornaam</th>
                                    <th>Tussenvoegsel</th>
                                    <th>Achternaam</th>
                                    <th>Email</th>
                                    <th>Bewerken</th>
                                    <th>Verwijderen</th>
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
