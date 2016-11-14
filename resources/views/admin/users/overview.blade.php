@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>Alle gebruikers</b></div>

                    <div class="panel-body">
                        @if (Session::has('failure'))
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ Session::get('failure') }}</strong>
                            </div>
                        @elseif (Session::has('delete_success'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('delete_success') }}
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
