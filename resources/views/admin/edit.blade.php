<?php $editing = DB::table($type)->where('id', $id)->first(); ?>

@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('admin/sidenav')
            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <b>{{$editing->title}} bewerken</b>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <?php $cols = DB::getSchemaBuilder()->getColumnListing($type); ?>
                            <?php foreach ($cols as $col) : ?>
                            <tr>
                                <td><?= trans('admin.' . $col); ?></td>
                                <td>
                                    <input type="text" value="{{$editing->$col}}"/>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection