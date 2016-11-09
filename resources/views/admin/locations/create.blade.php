@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-push-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>Gebruiker bewerken</b></div>

                    <div class="panel-body">
                        <form method="post" action="/admin/location/create">
                            {{ csrf_field() }}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" placeholder="Locatie naam" name="name">
                                </div>
                                <div class="input-group pull-left">
                                    <label>City</label>
                                    <select class="form-control" name="role">
                                        <option>Selecteer een city</option>
                                        @foreach(\App\Models\City::all() as $city)
                                            <option value="{{ $city->id }}" selected>{{ $city->name }}</option>
                                        @endforeach
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
