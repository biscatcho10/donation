@extends('dashboard::layouts.default')

@section('title')
    @lang('donations::donors.actions.create')
@endsection

@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', trans('donations::donors.plural'))
        @slot('breadcrumbs', ['dashboard.donors.create'])

        {{ BsForm::resource('donations::donors')->post(route('dashboard.donors.store'), ['files' => true,'data-parsley-validate']) }}
        @component('dashboard::layouts.components.box')
            @slot('title', trans('donations::donors.actions.create'))

            @include('donations::donors.partials.form')

            @slot('footer')
                {{ BsForm::submit()->label(trans('donations::donors.actions.save')) }}
            @endslot
        @endcomponent
        {{ BsForm::close() }}

    @endcomponent
@endsection
