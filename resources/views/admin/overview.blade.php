@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('admin/sidenav')
            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <b>Alle {{$type}}?</b>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <?php $cols = DB::getSchemaBuilder()->getColumnListing($type); ?>
                                <?php foreach ($cols as $col) : ?>
                                <th><?= trans('admin.' . $col); ?></th>
                                <?php endforeach; ?>
                                <th>Bewerken</th>
                                <th>Verwijderen</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $rows = DB::table($type)->get(); ?>
                            <?php foreach ($rows as $row) : ?>
                            <tr style="margin-top: 50px; margin-bottom: 5em;">
                                <?php foreach ($cols as $col) : ?>
                                <td>
                                    <?= $row->$col; ?>
                                </td>
                                <?php endforeach; ?>
                                <td>
                                    <a href="{{url('/')}}/admin/type/edit/{{$row->id}}" class="btn btn-primary">
                                        <i class="fa fa-pencil" aria-hidden="true"></i> Bewerken
                                    </a>
                                </td>
                                <td>
                                    <a href="{{url('/')}}/admin/type/delete/{{$row->id}}" class="btn btn-danger">
                                        <i class="fa fa-trash" aria-hidden="true"></i> Verwijderen
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection