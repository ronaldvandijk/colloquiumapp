@extends('layouts.app')


@section('styles')
    <link rel="stylesheet" href="/css/jquery.minicolors.css">
@endsection

@section('scripts')
    <script src="/js/jquery.minicolors.min.js"></script>
    <script>
        // change all inputs with class 'minicolors' to a minicolors input
        $('input.minicolors').minicolors();
    </script>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-push-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><a class="btn btn-primary" href="{{action('Admin\ThemeController@index')}}"><i class="fa fa-arrow-left"></i> {{ trans('common.overview') }}</a> <b>{{ trans('common.modelcreate', ['modelName' => trans('admin/theme.modelname')]) }}</b></div>

                    <div class="panel-body">
                        <form method="post" action="/admin/themes">
                            {{ csrf_field() }}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">{{ trans('admin/theme.name') }}</label>
                                    <input id="name" name="name" required type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="color">{{ trans('admin/theme.color') }}</label>
                                    <input class="minicolors form-control" id="color" name="color" type="text" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success pull-right">{{ trans('common.create') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    @if(count($errors) > 0)
                        <div class="row">
                            <div class="col-md-6">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
