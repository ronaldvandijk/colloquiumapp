@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin/sidenav')
            @if(Session::has('message'))
                        <div class="alert alert-info">{{ Session::get('message') }}</div>
                    @endif
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>Rooms</b></div>
                    <div class="panel-body">
                        @if (isset($message))
                            <div>
                                {{ $message }}
                            </div>
                        @endif

                        <div>
                            <a href="{{ url('/admin/room/create') }}">Create</a>
                        </div>

                        @foreach ($data as $room)
                            <div>
                                {{ $room->name }} -
                                Houses {{ $room->capacity }} people in {{ $room->building->name }}

                                <span class="pull-right">
                                    <a href="/admin/room/edit/{{ $room->id }}">{{ trans('common.edit') }}</a>
                                    <form action="{{ url('/admin/room/destroy/' . $room->id) }}" method="post">
                                    	{{ method_field("delete") }}
                                    	{{ csrf_field() }}
                                    	<input type="submit" value="{{ trans('common.delete') }}">

                                    </form>
                                </span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
