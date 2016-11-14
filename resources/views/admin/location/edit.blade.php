@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($errors->all() as $error)
                <div class="alert alert-info">{{ $error }}</div>
            @endforeach
            <div class="col-md-10 col-md-push-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>{{ trans('admin/location.edit_title') }}</b></div>

                    <div class="panel-body">
                        <form method="post" action="/admin/locations/{{ $location->id }}">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text"
                                           class="form-control"
                                           placeholder="{{ trans('admin/location.name') }}"
                                           name="name"
                                           value="{{ request()->old('name') ?? $location->name }}"
                                    />
                                </div>
                                <div class="input-group">
                                    <label>{{ trans('admin/location.city') }}</label>
                                    <select class="form-control" name="city_id">
                                        <option>{{ trans('admin/location.select_city') }}</option>
                                        @foreach(\App\Models\City::all() as $city)
                                            @if($location->city_id == $city->id)
                                                <option value="{{ $city->id }}" selected>{{ $city->name }}</option>
                                            @else
                                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12" style="padding: 20px 15px 0 30px;">
                                    <a class="btn btn-default pull-left" href="{{ url('/admin/location') }}">{{ trans('admin/location.goback') }}</a>
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
