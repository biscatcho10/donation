@extends('dashboard::layouts.default')

@section('title')
    {{ $subservice->name }}
@endsection

@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', $subservice->name)
        @slot('breadcrumbs', ['dashboard.subservices.edit', [$service, $subservice]])

        {{ BsForm::resource('services::subservices')->putModel($subservice, route('dashboard.subservices.update', [$service, $subservice]), ['files' => true,'data-parsley-validate']) }}
        @component('dashboard::layouts.components.box')
            @slot('title', trans('services::subservices.actions.edit'))

            @include('services::subservices.partials.form')

            @slot('footer')
                {{ BsForm::submit()->label(trans('services::subservices.actions.save')) }}
            @endslot
        @endcomponent
        {{ BsForm::close() }}

    @endcomponent
@endsection
