@extends('layouts.app')

@section('title','Create user')

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
                            <div>
                                If you like my profile Kurosawa I'm just a regular guy short-term dating. Too many to list vinyl records my cats parallel parking my height and shoulders, Murakami my eyes crossfit Sunday funday listening to music. Only looking for something casual Kurosawa local sports teams someone who shares my sense of humor outdoor activities but then it wouldn't be private.
                            </div>
                            <form method="post" action="/mycolloquia/store">
                                {{ csrf_field() }}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{ trans('user/colloquium/edit.title') }}</label>
                                        <input type="text" class="form-control" name="title">
                                    </div>
                                    <div class="form-group">
                                        <label>{{ trans('user/colloquium/edit.description') }}</label>
                                        <input type="text" class="form-control" name="description">
                                    </div>
                                    <div class="form-group">
                                        <label>{{ trans('user/colloquium/edit.company_url') }}</label>
                                        <input type="text" class="form-control" name="company_url">
                                    </div>
                                    <div class="form-group">
                                        <label>{{ trans('user/colloquium/edit.company_image') }}</label>
                                        <input type="text" class="form-control" name="company_image">
                                    </div>
                                    <div class="form-group">
                                        <label>{{ trans('user/colloquium/edit.type') }}</label>
                                        <select name="type_id">
                                            @foreach($types as $type)
                                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>{{ trans('user/colloquium/edit.language') }}</label>
                                        <select name="language_id">
                                            @foreach($languages as $lang)
                                                <option value="{{ $lang->id }}">{{ $lang->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>{{ trans('user/colloquium/edit.themes') }}</label>
                                            @foreach($themes as $theme)
                                                <input type="checkbox" name="themes" value="{{ $theme->id }}">{{ $theme->name }}</input>
                                            @endforeach
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