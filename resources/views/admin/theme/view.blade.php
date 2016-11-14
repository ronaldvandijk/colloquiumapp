<?php
/**
 * @var $theme \App\Models\Theme
 */
?>

@extends('layouts.app')

@section('title', 'Theme '.$theme->name)

@section('content')
    <div class="container">
        <h2>Preview of label: {{ $theme->name }}</h2>
        <div class="row">
            <div class="col-sm-12">
                <table class="table">
                    <tr>
                        <td>Name:</td>
                        <td>{{ $theme->name }}</td>
                    </tr>
                    <tr>
                        <td>Color:</td>
                        <td>#{{ $theme->color }}</td>
                    </tr>
                    <tr>
                        <td>Preview:</td>
                        <td>{!! $theme->render(14) !!}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection