@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin/sidenav')
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
                            <a href="/admin/room/create">Create</a>
                        </div>

                        @foreach ($data as $room)
                            <div>
                                {{ $room->name }} -
                                Houses {{ $room->capacity }} people in {{ $room->building->name }}

                                <span class="pull-right">
                                    <a href="/admin/room/edit/{{ $room->id }}">Edit</a>
                                    <a href="/admin/room/delete/{{ $room->id }}">Delete</a>
                                </span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
