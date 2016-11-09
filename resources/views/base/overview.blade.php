@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Base Overview</h2>
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <b>Lorum ipsum</b>
                </div>
                <div class="panel-body">
                    <table>
                        <thead>
                            <tr>
                                @foreach($properties as $property)
                                    <th>{{$property}}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $object)
                             <tr>
                                @foreach($properties as $property)
                                    <td>{{$object->$property}}</td>
                                @endforeach
                                <td><a href="/city/{{ $object->id }}/edit">{{ trans('edit') }}</a></td>
                                <td><a href="#">{{ trans('delete') }}</a></td>
                             </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection