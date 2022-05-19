@extends('dashboard::layouts.default')

@section('title')
    {{ $partner->name }}
@endsection

@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', $partner->name)
        @slot('breadcrumbs', ['dashboard.partners.edit', $partner])

        {{ BsForm::resource('partners::partners')->putModel($partner, route('dashboard.partners.update', $partner), ['files' => true,'data-parsley-validate']) }}
        @component('dashboard::layouts.components.box')
            @slot('title', trans('partners::partners.actions.edit'))

            @include('partners::partners.partials.form')

            @slot('footer')
                {{ BsForm::submit()->label(trans('partners::partners.actions.save')) }}
            @endslot
        @endcomponent
        {{ BsForm::close() }}

    @endcomponent
@endsection
