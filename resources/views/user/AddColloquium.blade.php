@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('addColloquium.panel-heading') }}</div>
                <div class="panel-body">
                    <form method="POST" action="">
                        <div class="form-group">
                            <label>{{ trans('addColloquium.title') }}</label>
                            <input type="text" class="form-control" name="title">
                        </div>
                        <div class="form-group">
                            <label>{{ trans('addColloquium.description') }}</label>
                            <textarea name="description" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('addColloquium.type') }}</label>
                            <select class="form-control" name="type">
                              <option>Auditorium</option>
                              <option>Exam</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('addColloquium.theme') }}</label>
                            <div class="checkbox">
                                <label>
                                  <input type="checkbox" value="option1">
                                  Lorem
                                </label>
                                <label>
                                  <input type="checkbox" value="option1">
                                  Ipsum
                                </label>
                                <label>
                                  <input type="checkbox" value="option1">
                                  Dolor
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('addColloquium.email') }}</label>
                            <input type="email" class="form-control" name="email">
                        </div>
                        <!-- {{ trans('addColloquium.email') }}<a class="btn btn-default">{{ trans('addColloquium.composeEmailBtn') }}</a><br/>-->
                        <div class="form-group">
                            <label>{{ trans('addColloquium.date') }}</label>
                            <input type="date" class="form-control" name="date">
                        </div>
                        <div class="form-group form-inline">
                            <label>{{ trans('addColloquium.time') }}</label>
                            <input type="time" class="form-control" name="timeStart"> {{ trans('addColloquium.untill') }} <input type="time" class="form-control" name="timeEnd">
                        </div>
                        <div class="form-group form-inline">
                            <label>{{ trans('addColloquium.location') }}</label>
                            <select class="form-control" name="city">
                              <option>Groningen</option>
                              <option>Assen</option>
                            </select>
                            <select class="form-control" name="building">
                              <option>Van DoorenVeste</option>
                              <option>Assen</option>
                            </select>
                            <select class="form-control" name="room">
                              <option>a123</option>
                              <option>a124</option>
                              <option>b144</option>
                            </select>
                        </div>
                        <button class="btn btn-default pull-right" type="confirm"> {{trans('addColloquium.confirm')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection