<?php
/**
 * @var $theme \App\Models\Theme
 */
?>

@extends('layouts.panel', [
    'title' => 'show theme',
    'btnText' => '<i class="fa fa-arrow-left"></i> ' . trans('common.overview'),
    'btnUrl' => url('/admin/themes'),
    'btnType' => 'default'
])

@section('title', 'Theme '.$theme->name)

@section('panel-body')
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
@endsection