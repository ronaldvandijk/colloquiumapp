@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-push-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>Gebruiker bewerken</b></div>

                    <div class="panel-body">
                        <form method="post" action="/admin/user/update">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Voornaam</label>
                                    <input type="text" class="form-control" placeholder="Sander" value="{{ $user->firstname }}">
                                </div>
                                <div class="form-group">
                                    <label>Tussenvoegsel</label>
                                    <input type="text" class="form-control" placeholder="van" value="{{ $user->firstname }}">
                                </div>
                                <div class="form-group">
                                    <label>Achternaam</label>
                                    <input type="text" class="form-control" placeholder="Kasteel" value="{{ $user->firstname }}">
                                </div>
                                <div class="form-group">
                                    <label>E-mail</label>
                                    <input type="email" class="form-control" placeholder="sandervankasteel@gmail.com" value="{{ $user->firstname }}">
                                </div>
                                <div class="form-group">
                                    <label>Wachtwoord</label>
                                    <input type="password" class="form-control" placeholder="*****" value="{{ $user->firstname }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-md-push-1">
                                <div class="input-group pull-left">
                                    <label>Rol</label>
                                    <select class="form-control">
                                        <option selected>User</option>
                                        <option>Examinator</option>
                                        <option>Planner</option>
                                        <option>Administrator</option>
                                        <option>Leuwarden</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success pull-right">Wijzigingen opslaan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
