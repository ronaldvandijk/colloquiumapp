@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Base Overview</h2>
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <b>Lorum ipsum</b>
                    <a href="{{ $baseUrl }}create" class="pull-right">Create</a>
                </div>
                <div class="panel-body">
                    <table>
                        <thead>
                            <tr>
                                @foreach($properties as $property)
                                    @if($property != "id")
                                        <th>{{$property}}</th>
                                    @endif
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $object)
                             <tr>
                                @foreach($properties as $property)
                                     @if($property != "id")
                                        <td>{{$object->$property}}</td>
                                     @endif
                                @endforeach
                                <td><a href="{{ $baseUrl }}{{ $object->id }}/edit" class="btn btn-success">{{ trans('edit') }}</a></td>
                                <td>
                                    <form action="{{ action($controllerName . '@destroy', ['id' => $object->id]) }} " method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" value="{{ trans('common.delete') }}" class="btn btn-danger"></button>
                                    </form>
                                </td>
                             </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection