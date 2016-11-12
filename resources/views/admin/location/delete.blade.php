@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($errors->all() as $error)
                <div class="alert alert-info">{{ $error }}</div>
            @endforeach
            <div class="col-md-10 col-md-push-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>{{ trans('admin/location.delete_title') }}</b></div>

                    <div class="panel-body">
                        <form method="post" action="/admin/locations">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <div class="col-md-6">
                                Weet u zeker dat u de locatie met de naam: "x" wilt verwijderen?
                                <input type="hidden" name="id" value="{{ $location->id }}">
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
