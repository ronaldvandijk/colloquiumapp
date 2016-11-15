@extends('layouts.app')

@section('title','Edit user')

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
                                    <label>{{ trans('user/colloquium/edit.title') }}</label>
                                    <input type="text" class="form-control" value="{{ $colloquium->title }}" name="title">
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('user/colloquium/edit.description') }}</label>
                                    <textarea type="text" class="form-control" name="description">{{ $colloquium->description }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('user/colloquium/edit.company_image') }}</label>
                                    <input type="text" class="form-control" value="{{ $colloquium->company_image }}" name="company_image">
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('user/colloquium/edit.company_url') }}</label>
                                    <input type="text" class="form-control" value="{{ $colloquium->company_url }}" name="company_url">
                                </div>
                                <div class="form-group">
                                    <label>Taal</label>
                                    <select name="language_id">
                                        @foreach($languages as $lang)
                                            <option value="{{ $lang->id }}" {{ $lang->id == $colloquium->language_id ? 'selected' : '' }}>{{ $lang->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success pull-right">{{ trans('common.modelupdate', ['modelName' =>trans('user/colloquium/general.modelName')]) }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
@endsection