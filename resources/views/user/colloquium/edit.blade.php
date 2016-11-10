@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <b>Colloquia</b>
                    </div>
                    <div class="panel-body">
                        <div class="panel-body">
                        <form method="post" action="/mycolloquia/update/{{ $colloquium->id }}">
                            {{ csrf_field() }}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Titel</label>
                                    <input type="text" class="form-control" value="{{ $colloquium->title }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success pull-right">Wijzigingen opslaan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
@endsection