@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($errors->all() as $error)
                <div class="alert alert-info">{{ $error }}</div>
            @endforeach
            <div class="col-md-10 col-md-push-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>{{ trans('admin/mailtemplate.create_title') }}</b></div>

                    <div class="panel-body">
                        <form method="post" action="/admin/mailtemplates">
                            {{ csrf_field() }}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ trans('admin/mailtemplate.name') }}</label>
                                    <input type="text"
                                           class="form-control"
                                           placeholder="{{ trans('admin/mailtemplate.name') }}"
                                           name="name"
                                           value="{{ request()->old('name') }}" />
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('admin/mailtemplate.subject') }}</label>
                                    <input type="text"
                                           class="form-control"
                                           placeholder="{{ trans('admin/mailtemplate.subject') }}"
                                           name="subject"
                                           value="{{ request()->old('subject') }}" />
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('admin/mailtemplate.body') }}</label>
                                    <textarea class="form-control"
                                              placeholder="{{ trans('admin/mailtemplate.body') }}"
                                              name="body"
                                              rows="5">
                                        {{ request()->old('body') }}
                                    </textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12" style="padding: 20px 15px 0 30px;">
                                    <a class="btn btn-default pull-left" href="{{ url('/admin/mailtemplates') }}">
                                        {{ trans('admin/mailtemplate.goback') }}
                                    </a>
                                    <button type="submit" class="btn btn-success pull-right">
                                        {{ trans('admin/mailtemplate.save') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
