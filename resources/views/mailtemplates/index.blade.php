@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <b>Mailtemplates</b>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <th>Id</th>
                            <th>Naam</th>
                            <th>Body</th>
                            <th>Onderwerp</th>
                        </thead>
                        <tbody>
                            @foreach($templates as $template)
                                <tr>
                                    <td>{{$template->id}}</td>
                                    <td>{{$template->name}}</td>
                                    <td>{{$template->body}}</td>
                                    <td>{{$template->subject}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
  <p></p>

@endsection
