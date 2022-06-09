@extends('dashboard::layouts.default')

@section('title')
    @lang('howknow::reasons.actions.create')
@endsection

@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', trans('howknow::reasons.actions.create'))
        @slot('breadcrumbs', ['dashboard.reasons.create'])

        {{ BsForm::post(route('dashboard.reasons.store'), ['data-parsley-validate']) }}
        @component('dashboard::layouts.components.box')
            @slot('title', trans('howknow::reasons.actions.create'))

            @include('howknow::partials.form')

            @slot('footer')
                {{ BsForm::submit()->label(trans('howknow::reasons.actions.save'))->attribute('class', 'btn btn-danger mb-2') }}
            @endslot
        @endcomponent
        {{ BsForm::close() }}

    @endcomponent
@endsection
