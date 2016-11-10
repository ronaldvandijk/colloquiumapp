@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Base edit</h2>
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Something bewerken</b></div>

                <div class="panel-body">
                    <form method="post" action="{{ $baseUrl }}update">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}
                        <div class="col-md-6">
                            <div class="form-group">
                                @foreach($properties as $property)
                                    @if($property != "id")
                                        <div class="form-group">
                                            <label>{{ $property }}</label>
                                            <input type="text" class="form-control" value="{{ $data->$property }}" name="{{$property}}">
                                        </div>
                                    @else
                                        <input type="hidden" value="{{ $data->$property }}" name="id">
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success pull-right">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection