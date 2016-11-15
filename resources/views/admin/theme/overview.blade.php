@extends('layouts.panel',  [
    'title' => trans('common.modeloverview', ['modelName' => trans('admin/theme.modelname')]),
    'btnUrl' => url('/admin/themes/create'),
    'btnText' => '<i class="fa fa-plus"></i> ' . trans('common.modelcreate', ['modelName' => trans('admin/theme.modelname')]),
])

@section('title','Admin theme overview')

@section('panel-body')
    <table class="table">
        <thead>
        <tr>
            <th>{{ trans('admin/theme.name') }}</th>
            <th>{{ trans('admin/theme.preview') }}</th>
            <th style="width: 1%"></th>
            <th style="width: 1%"></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($themes as $theme)
            <tr>
                <td>{{$theme->name}}</td>
                <td>{!! $theme->render() !!}</td>
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
@endsection
