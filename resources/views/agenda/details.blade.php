@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <a href="{{ url('agenda') }}" class="btn btn-primary"><i class="fa fa-chevron-left" aria-hidden="true"></i> {{ trans('agenda.back') }}</a>
        <button class="btn btn-success pull-right">{{ trans('agenda.interested') }}</button>
        <hr>
        <div class="presentatie-details">
        <h1><b>{{ $colloquium->title }}</b></h1>
        <hr>
        <div class="row">
            <div class="col-xs-5">
                <img src="{{ $colloquium->user->image }}" alt="" />
            </div>
            <div class="col-xs-7">
                <p><b>{{ trans('agenda.speaker') }}: </b>{{ $colloquium->user->first_name }} {{ $colloquium->user->insertion }} {{ $colloquium->user->last_name }}</p>
                <p><b>{{ trans('agenda.type') }}: </b>{{ $colloquium->type->name }}</p>
                <p><b>{{ trans('agenda.duration') }}: </b>{{ format('j M Y H:i', $colloquium->start_date) }} - {{ format('j M Y H:i', $colloquium->end_date) }}</p>
                <p><b>{{ trans('agenda.room') }}: </b>{{ $colloquium->room->building->name }}, {{ $colloquium->room->name }}</p>
                <p><b>{{ trans('agenda.location') }}: </b>{{ $colloquium->room->building->location->name }}, {{ $colloquium->room->building->location->city->name }}</p>
                <p><b>{{ trans('agenda.language') }}: </b>{{ $colloquium->language->name }}</p>
                <p><b>{{ trans('agenda.interested') }}: </b>{{ $colloquium->invitees->count() }} {{ trans('agenda.people') }}</p>
            </div>
        </div>
        <h3><b>{{ trans('agenda.description') }}</b></h3>
        <p>
            {{ $colloquium->description }}
        </p>
        <img src="{{ $colloquium->company_image }}" alt="" />
    </div>
    </div>
@endsection

