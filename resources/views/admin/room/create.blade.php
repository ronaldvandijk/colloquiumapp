@extends('layouts.panel', [
    'title' => trans('admin/room.create_title'),
    'btnText' => trans('common.overview'),
    'btnUrl' => url('/admin/rooms'),
    'btnType' => 'default',
])

@section('title','Admin - ' . trans('admin/room.create_title'))

@section('panel-body')
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
@endsection
