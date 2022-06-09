@extends('dashboard::layouts.default')

@section('title')
    @lang('howknow::reasons.actions.edit')
@endsection

@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', trans('howknow::reasons.actions.edit'))
        @slot('breadcrumbs', ['dashboard.reasons.edit', $reason])

        {{ BsForm::resource('reason')->putModel($reason, route('dashboard.reasons.update', $reason), ['data-parsley-validate']) }}
        @component('dashboard::layouts.components.box')
            @slot('title', trans('howknow::reasons.actions.edit'))

            @include('howknow::partials.form')

            @slot('footer')
                {{ BsForm::submit()->label(trans('howknow::reasons.actions.save'))->attribute('class', 'btn btn-danger mb-2') }}
            @endslot
        @endcomponent
        {{ BsForm::close() }}

    @endcomponent
@endsection
