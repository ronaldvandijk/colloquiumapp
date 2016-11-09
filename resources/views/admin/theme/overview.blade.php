@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>{{ trans('admin/theme/overview.title') }}</b></div>

                    <div class="panel-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($themes as $theme)

                                <tr style="margin-top: 50px; margin-bottom: 5em;">
                                    <td>{{$theme->id}}</td>
                                    <td>{{$theme->name}}</td>
                                    <td><a href="{{action('Admin\ThemeController@edit',['id' => $theme->id])}}" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i> Bewerken</a></td>
                                    <td><a href="{{action('Admin\ThemeController@destroy',['id' => $theme->id])}}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Verwijderen</a></td>
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
