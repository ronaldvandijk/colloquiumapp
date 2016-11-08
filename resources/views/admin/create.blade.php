@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('admin/sidenav')
            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <b>{{$type}} maken</b>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <?php $cols = DB::getSchemaBuilder()->getColumnListing($type); ?>
                            <?php foreach ($cols as $col) : ?>
                            <tr>
                                <td><?= trans('admin.' . $col); ?></td>
                                <td>
                                    <input type="text" value="leeg"/>
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