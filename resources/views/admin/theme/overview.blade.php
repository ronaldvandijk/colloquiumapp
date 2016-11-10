@extends('layouts.app')

@section('content')
    <div class="container">
        <a class="btn btn-success" href="{{ action('Admin\ThemeController@create') }}">{{ trans('common.modelcreate', ['modelName' => trans('admin/theme.modelname')]) }}</a>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>{{ trans('admin/theme/overview.title') }}</b></div>

                    @if(Session::has('message'))
                        <div class="alert alert-info">{{ Session::get('message') }}</div>
                    @endif
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>{{ trans('common.id') }}</th>
                                <th>{{ trans('admin/theme.name') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($themes as $theme)
                                <tr>
                                    <td>{{$theme->id}}</td>
                                    <td>{{$theme->name}}</td>
                                    <td><a href="{{action('Admin\ThemeController@edit',['id' => $theme->id])}}" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i> {{ trans('common.update') }}</a></td>
                                    <td>
                                        <form method="post" action="/admin/themes/{{$theme->id}}">
                                            {{method_field('DELETE')}}
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
