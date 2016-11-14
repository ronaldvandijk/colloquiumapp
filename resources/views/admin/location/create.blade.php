@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($errors->all() as $error)
                <div class="alert alert-info">{{ $error }}</div>
            @endforeach
            <div class="col-md-10 col-md-push-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>{{ trans('common.modelupdate', [trans('common.location')]) }}</b></div>

                    <div class="panel-body">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
