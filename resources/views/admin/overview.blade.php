@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>Alle {{$type}}?</b></div>

                    <div class="panel-body">
                        <table class="table">
                            <thead>
                            <tr>
                                {{--@foreach ($properties as $property)--}}
                                {{--<th>$property</th>--}}
                                {{--@endforeach--}}
                                <th>Bewerken</th>
                                <th>Verwijderen</th>
                            </tr>
                            </thead>
                            <tbody>
                            {{--@foreach ($typeneeded as $type)--}}
                            <tr style="margin-top: 50px; margin-bottom: 5em;">
                                {{--@foreach ($typeProperties as $typeProperty)--}}
                                {{--<td>{{$type->property}}</td>--}}
                                {{--@endforeach--}}
                                <td>
                                    {{--<a href="/admin/type/edit/{{$type->id}}" class="btn btn-primary">--}}
                                    <i class="fa fa-pencil" aria-hidden="true"></i> Bewerken
                                    {{--</a>--}}
                                </td>
                                <td>
                                    {{--<a href="/admin/type/delete/{{$type->id}}" class="btn btn-danger">--}}
                                    <i class="fa fa-trash" aria-hidden="true"></i> Verwijderen
                                    {{--</a>--}}
                                </td>
                            </tr>
                            {{--@endforeach--}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection