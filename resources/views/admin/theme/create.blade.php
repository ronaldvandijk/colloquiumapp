@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-push-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>Theme Aanmaken</b></div>

                    <div class="panel-body">
                        <form method="post" action="/admin/themes">
                            {{ csrf_field() }}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Naam van Thema</label>
                                    <input name="name" required type="text" class="form-control" placeholder="Naam van thema">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success pull-right">{{ trans('common.create') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    @if(count($errors) > 0)
                        <div class="row">
                            <div class="col-md-6">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
