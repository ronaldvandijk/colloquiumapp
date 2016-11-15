@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach($errors->all() as $error)
            <div class="alert alert-info">{{ $error }}</div>
        @endforeach
        @if(request()->session()->has('custom_error'))
            <div class="alert alert-{{ request()->session()->get('custom_error')['type'] }}">
                {{ request()->session()->get('custom_error')['message'] }}
            </div>
        @endif
        <div class="col-md-10 col-md-push-1">
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
