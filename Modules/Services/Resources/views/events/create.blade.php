@extends('dashboard::layouts.default')

@section('title')
    @lang('services::events.actions.create')
@endsection

@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', trans('services::events.plural'))
        @slot('breadcrumbs', ['dashboard.services.create', $gallery])

        {{ BsForm::resource('services::events')->post(route('dashboard.events.store',$gallery), ['files' => true,'data-parsley-validate']) }}
        @component('dashboard::layouts.components.box')
            @slot('title', trans('services::events.actions.create'))

            @include('services::events.partials.form')

            @slot('footer')
                {{ BsForm::submit()->label(trans('services::events.actions.save')) }}
            @endslot
        @endcomponent
        {{ BsForm::close() }}

    @endcomponent
@endsection
