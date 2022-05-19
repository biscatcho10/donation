@extends('dashboard::layouts.default')

@section('title')
    @lang('partners::partners.actions.create')
@endsection

@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', trans('partners::partners.plural'))
        @slot('breadcrumbs', ['dashboard.partners.create'])

        {{ BsForm::resource('partners::partners')->post(route('dashboard.partners.store'), ['files' => true,'data-parsley-validate']) }}
        @component('dashboard::layouts.components.box')
            @slot('title', trans('partners::partners.actions.create'))

            @include('partners::partners.partials.form')

            @slot('footer')
                {{ BsForm::submit()->label(trans('partners::partners.actions.save')) }}
            @endslot
        @endcomponent
        {{ BsForm::close() }}

    @endcomponent
@endsection
