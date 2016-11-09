@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('addColloquium.panel-heading') }}</div>

                <div class="panel-body">
                    <form method="POST" action="">
                        {{ trans('addColloquium.title') }}<input type="text" name="title"><br/>
                        {{ trans('addColloquium.description') }} <input type="textbox" name="description"><br/>
                        {{ trans('addColloquium.type')  }}<select name="type">
                            <option>Auditorium</option>
                            <option>Exam</option>
                        </select>
                        {{ trans('addColloquium.theme') }}<div style="overflow-y: scroll; width:400px; height: 250px;">
                            <input type="checkbox"><label>lorum</label>
                            <input type="checkbox"><label>ipsum</label>
                            <input type="checkbox"><label>dolor</label>
                        </div>
                        {{ trans('addColloquium.email') }}<a class="btn btn-default">{{ trans('addColloquium.composeEmailBtn') }}</a><br/>
                        {{ trans('addColloquium.date') }}<input type="date" name="date"/><br/>
                        {{ trans('addColloquium.time') }}<input type="time" name="timeStart"/><input type="time" name="timeEnd"/><br/>
                        {{ trans('addColloquium.location') }}<br/>
                        <select name="City">
                            <option>Groningen</option>
                            <option>Assen</option>
                        </select>
                        <select name="Building">
                            <option>Van DoorenVeste</option>
                            <option>De Appel</option>
                        </select>
                        <select name="Room">
                            <option>a123</option>
                            <option>a124</option>
                            <option>b144</option>
                        </select>
                        <button class="btn btn-default pull-right" type="confirm"> {{trans('addColloquium.confirm')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection