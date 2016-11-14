@extends('layouts.app')

@section('title','Admin city edit')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($errors->all() as $error)
                <div class="alert alert-info">{{ $error }}</div>
            @endforeach
            <div class="col-md-10 col-md-push-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>{{ trans('admin/city.edit_title') }}</b></div>

                    <div class="panel-body">
                        <form method="post" action="/admin/cities/{{ $data->id }}">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ trans('admin/city.name') }}</label>
                                    <input type="text"
                                           class="form-control"
                                           placeholder="{{ trans('admin/city.name') }}"
                                           name="name"
                                           value="{{ request()->old('name') ?? $data->name }}"
                                    />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12" style="padding: 20px 15px 0 30px;">
                                    <a class="btn btn-default pull-left" href="{{ url('/admin/cities') }}">{{ trans('admin/city.goback') }}</a>
                                    <button type="submit" class="btn btn-success pull-right">{{ trans('admin/city.save') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
