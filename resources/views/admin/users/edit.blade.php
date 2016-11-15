@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-push-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>Gebruiker bewerken</b></div>

                    <div class="panel-body">
                        <form method="post" action="">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $user->id }}" />
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Voornaam</label>
                                    <input type="text" name="first_name" class="form-control" placeholder="Voornaam" value="{{ $user->first_name}}">
                                </div>
                                <div class="form-group">
                                    <label>Tussenvoegsel</label>
                                    <input type="text" name="insertion" class="form-control" placeholder="Tussenvoegsel" value="{{ $user->insertion}}">
                                </div>
                                <div class="form-group">
                                    <label>Achternaam</label>
                                    <input type="text" name="last_name" class="form-control" placeholder="Achternaam" value="{{ $user->last_name}}">
                                </div>
                                <div class="form-group">
                                    <label>E-mail</label>
                                    <input type="email" name="email" class="form-control" placeholder="Email" value="{{ $user->email }}">
                                </div>
                                <div class="form-group">
                                    <label>Update wachtwoord</label>
                                    <input type="password" name="password" class="form-control" placeholder="Wachtwoord" value="">
                                </div>
                                <div class="form-group">
                                    <label>Wachtwoord verificatie</label>
                                    <input type="password" name="password_confirmation" class="form-control" placeholder="Herhaal Wachtwoord" value="">
                                </div>
                            </div>
                            <div class="col-md-6 col-md-push-1">
                                <div class="input-group pull-left">
                                    <label>Rol</label>
                                    <select class="form-control" name="role">
                                        @foreach($roles as $role)
                                            @if($role->id === $user->role_id)
                                                <option value="{{$role->id}}" selected>{{$role->name}}</option>
                                            @else
                                                <option value="{{$role->id}}">{{$role->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success pull-right">Wijzigingen opslaan</button>
                                    <a href="/admin/users" class="btn btn-success">terug</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
