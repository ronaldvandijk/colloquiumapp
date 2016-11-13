@extends('layouts.app')

@section('content')
    <div class="container">
        @if(request()->session()->has('custom_error'))
            <div class="alert alert-{{ request()->session()->get('custom_error')['type'] }}">
                {{ request()->session()->get('custom_error')['message'] }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>{{ trans('admin/mailtemplate.list_title') }}</b></div>
                    <div>
                        <a class="btn btn-default" href="{{ url('/admin/mailtemplates/create') }}">
                            {{ trans('admin/mailtemplate.add_template') }}
                        </a>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>{{ trans('common.id') }}</th>
                                    <th>{{ trans('admin/mailtemplate.name') }}</th>
                                    <th>{{ trans('admin/mailtemplate.subject') }}</th>
                                    <th>{{ trans('common.edit') }}</th>
                                    <th>{{ trans('common.delete') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $template)
                                    <tr style="margin-top: 50px; margin-bottom: 5em;">
                                        <td>{{ $template->id }}</td>
                                        <td>{{ $template->name }}</td>
                                        <td>{{ $template->subject }}</td>
                                        <td>
                                            <a href="/admin/mailtemplates/{{ $template->id }}/edit" class="btn btn-primary">
                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                                {{ trans('common.edit') }}
                                            </a>
                                        </td>
                                        <td>
                                            <form method="post" action="/admin/mailtemplates/{{ $template->id }}">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button class="btn btn-danger"
                                                        type="submit">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                    {{ trans('common.delete') }}
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

