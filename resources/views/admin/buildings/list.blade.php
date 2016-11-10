@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <b>Gebouwen</b>
                        <div class="pull-right">
                            <a href="/admin/building/create" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>Gebouw toevoegen</a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Naam</th>
                                <th>Gebouw</th>
                                <th>Stad</th>
                                <th>Afkorting</th>
                                <th>Bewerken</th>
                                <th>Verwijderen</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($buildings as $building)
                                <tr style="margin-top: 50px; margin-bottom: 5em;">
                                    <td>{{ $building->name }}</td>
                                    <td>{{ $building->location->name }}</td>
                                    <td>{{ $building->location->city->name }}</td>
                                    <td>{{ $building->abbreviation }}</td>
                                    <td><a href="/admin/building/{{$building->id}}/edit" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i> Bewerken</a></td>
                                    <td>
                                        <form method="post" action="/admin/building/{{$building->id}}">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> {{ trans('common.delete') }}</button>
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
