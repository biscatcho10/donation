@extends('dashboard::layouts.default')

@section('title')
    @lang('donations::methods.actions.create')
@endsection

@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', trans('donations::methods.plural'))
        @slot('breadcrumbs', ['dashboard.partners.create'])

        {{ BsForm::resource('donations::methods')->post(route('dashboard.donation-methods.store'), ['files' => true,'data-parsley-validate']) }}
        @component('dashboard::layouts.components.box')
            @slot('title', trans('donations::methods.actions.create'))

            @include('donations::methods.partials.form')

            @slot('footer')
                {{ BsForm::submit()->label(trans('donations::methods.actions.save')) }}
            @endslot
        @endcomponent
        {{ BsForm::close() }}

    @endcomponent
@endsection
