@extends('layouts.panel', [
    'title' => trans('common.modelupdate', ['modelName' => trans('common.location')])
])

@section('title','Admin location create')

@section('panel-body')
    <form method="post" action="/admin/locations">
        {{ csrf_field() }}
        <div class="col-md-6">
            <div class="form-group">
                <label>{{ trans('common.name') }}</label>
                <input type="text"
                       class="form-control"
                       placeholder="Locatie naam"
                       name="name"
                       value="{{ request()->old('name') }}"
                />
            </div>
            <div class="input-group pull-left">
                <label>{{ trans('common.city') }}</label>
                <select class="form-control" name="city_id">
                    <option selected>{{ trans('admin/location.select_city') }}</option>
                    @foreach(\App\Models\City::all() as $city)
                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12" style="padding: 20px 15px 0 30px;">
                <a class="btn btn-default pull-left" href="{{ url('/admin/locations') }}">{{ trans('admin/location.goback') }}</a>
                <button type="submit" class="btn btn-success pull-right">{{ trans('admin/location.save') }}</button>
            </div>
        </div>
    </form>
@endsection
