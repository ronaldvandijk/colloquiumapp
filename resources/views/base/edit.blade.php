@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Base edit</h2>
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <b>Lorum ipsum</b>
                </div>
                <div class="panel-body">
                    <table>
                        <thead>
                            @foreach($properties as $property)
                                {{$property}}
                            @endforeach
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection