@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Base create</b></div>

                <div class="panel-body">
                    <form method="post" action="{{ $baseUrl }}">
                        {{ csrf_field() }}
                        <div class="col-md-6">
                            <div class="form-group">
                                @foreach($properties as $property)
                                    @if($property != "id")
                                        <div class="form-group">
                                            <label>{{ $property }}</label>
                                            <input type="text" class="form-control" name="{{$property}}">
                                        </div>
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