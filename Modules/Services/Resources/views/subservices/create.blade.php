@extends('dashboard::layouts.default')

@section('title')
    @lang('services::subservices.actions.create')
@endsection

@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', trans('services::subservices.plural'))
        @slot('breadcrumbs', ['dashboard.subservices.create', $service])

        {{ BsForm::resource('services::subservices')->post(route('dashboard.subservices.store',$service), ['files' => true,'data-parsley-validate']) }}
        @component('dashboard::layouts.components.box')
            @slot('title', trans('services::subservices.actions.create'))

            @include('services::subservices.partials.form')

            @slot('footer')
                {{ BsForm::submit()->label(trans('services::subservices.actions.save')) }}
            @endslot
        @endcomponent
        {{ BsForm::close() }}

    @endcomponent
@endsection
