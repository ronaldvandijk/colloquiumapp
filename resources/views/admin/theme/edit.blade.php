@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-push-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>Theme bewerken</b></div>

                    <div class="panel-body">
                        <form method="post" action="/admin/themes/{{ $theme->id }}">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ trans('admin.theme.name') }}</label>
                                    <input name="name" type="text" class="form-control" placeholder="Naam van thema" value="{{ $theme->name }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success pull-right">{{ trans('common.update') }}</button>
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
