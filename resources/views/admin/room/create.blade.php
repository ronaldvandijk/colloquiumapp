@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-push-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                    	@include('layouts.panel_heading', [
                    		'title' => trans('common.modelcreate', ['modelName' => trans('common.room')]),
                    		'button' => trans('common.overview'),
                    		'url' => url('/admin/rooms'),
                    	])
                    </div>
                    <div class="panel-body">
                        <form method="post" action="{{ url('/admin/rooms') }}">
                            {{ csrf_field() }}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ trans('common.name') }}</label>
                                    <input type="text" class="form-control" placeholder="A204" name="name">
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('common.capacity') }}</label>
                                    <input type="number" class="form-control" placeholder="25" name="capacity">
                                </div>
                            </div>
                            <div class="col-md-6 col-md-push-1">
                                <div class="input-group pull-left">
                                    <label>{{ trans('common.building') }}</label>
                                    <select class="form-control" name="building_id">
                                        @foreach(App\Models\Building::all() as $building)
                                            <option value="{{ $building->id }}">{{ $building->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success pull-right">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
