@extends('dashboard::layouts.default')

@section('title')
    @lang('settings::awards.actions.create')
@endsection

@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', trans('settings::awards.plural'))
        @slot('breadcrumbs', ['dashboard.awards.create'])

        {{ BsForm::resource('settings::awards')->post(route('dashboard.awards.store'), ['files' => true,'data-parsley-validate']) }}
        @component('dashboard::layouts.components.box')
            @slot('title', trans('settings::awards.actions.create'))

            @include('settings::awards.partials.form')

            @slot('footer')
                {{ BsForm::submit()->label(trans('settings::awards.actions.save')) }}
            @endslot
        @endcomponent
        {{ BsForm::close() }}

    @endcomponent
@endsection
