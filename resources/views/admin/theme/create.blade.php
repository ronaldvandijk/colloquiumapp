@extends('layouts.panel', [
    'title' => trans('admin/theme.create_title'),
    'btnText' => '<i class="fa fa-arrow-left"></i> ' . trans('common.overview'),
    'btnUrl' => url('/admin/themes'),
    'btnType' => 'default'
])

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

@section('title','Admin theme create')

@section('panel-body')
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
@endsection
