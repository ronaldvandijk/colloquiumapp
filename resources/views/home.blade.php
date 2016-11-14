@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>({{ count($colloquia) }}) Colloquia gevonden op deze locatie</h2>
        <div class="row">
            @foreach($colloquia as $colloquium)
                <div class="col-sm-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">{{ $colloquium->title }}
                            @foreach($colloquium->themes as $theme)
                                {!! $theme->render() !!}
                            @endforeach
                        </div>
                        <div class="panel-body">{{ $colloquium->description }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
