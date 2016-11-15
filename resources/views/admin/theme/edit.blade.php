@extends('layouts.panel', [
    'title' => trans('admin/theme.edit_title'),
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

@section('title','Admin theme edit')

@section('panel-body')
    <form method="post" action="/admin/themes/{{ $theme->id }}">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}
        <div class="col-md-6">
            <div class="form-group">
                <label for="name">{{ trans('admin/theme.name') }}</label>
                <input id="name" name="name" type="text" class="form-control" value="{{ $theme->name }}">
            </div>
            <div class="form-group">
                <label for="color">{{ trans('admin/theme.color') }}</label>
                <input id="color" name="color" type="text" class="minicolors form-control" value="{{ $theme->color }}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <button type="submit" class="btn btn-success pull-right">{{ trans('common.update') }}</button>
            </div>
        </div>
    </form>
@endsection
