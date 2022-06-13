@extends('dashboard::layouts.default')

@section('title')
    {{ $donor->name }}
@endsection

@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', $donor->name)
        @slot('breadcrumbs', ['dashboard.donors.edit', $donor])

        {{ BsForm::resource('donations::donors')->putModel($donor, route('dashboard.donors.update', $donor), ['files' => true,'data-parsley-validate']) }}
        @component('dashboard::layouts.components.box')
            @slot('title', trans('donations::donors.actions.edit'))

            @include('donations::donors.partials.form')

            @slot('footer')
                {{ BsForm::submit()->label(trans('donations::donors.actions.save')) }}
            @endslot
        @endcomponent
        {{ BsForm::close() }}

    @endcomponent
@endsection
