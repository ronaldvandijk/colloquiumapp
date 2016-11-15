@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
    		<h1 style="color: red;">404</h1>
    		<h2>{{ trans('errors/messages.title404') }}</h2>
    		<hr />
    		<p>{!! trans('errors/messages.errorDescription404') !!}</p>
    		<p>{{ trans('errors/messages.solution') }}</p>
    		<ul>
      			<li>{!! trans('errors/messages.troubleshootingFirst') !!}</li>
      			<li>{!! trans('errors/messages.troubleshootingSecond') !!}</li>
      			<li>{{ trans('errors/messages.troubleshootingThird') }}</li>
    		</ul><br>
    		<div class="text-left">
    			<a style="margin-right: 10px;" onclick="history.back(-1)" class="btn btn-default" role="button">{{ trans('errors/messages.backBtn') }}</a>
      			<a href="/home" class="btn btn-default" role="button">{{ trans('errors/messages.homeBtn') }}</a>
      		</div>
  		</div>
	</div>
</div>
@endsection
