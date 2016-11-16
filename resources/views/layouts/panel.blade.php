@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
	        @foreach($errors->all() as $error)
	            <div class="alert alert-warning">{{ $error }}</div>
	        @endforeach
            <div class="panel panel-default">
                <div class="panel-heading">
                    <b>{{ $title }}</b>

                    @if(isset($btnUrl) && isset($btnText))
                        <a class="btn btn-sm btn-{{ isset($btnType) ? $btnType : 'success' }} pull-right" href="{{ $btnUrl }}">
                            {!! $btnText !!}
                        </a>
                        <div class="clearfix"></div>
                    @endif
                </div>

                <div class="panel-body">
                    @yield('panel-body')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
