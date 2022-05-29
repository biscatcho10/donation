@extends('dashboard::layouts.default')

@section('title')
    @lang('services::galleries.actions.create')
@endsection

@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', trans('services::galleries.plural'))
        @slot('breadcrumbs', ['dashboard.services.create'])

        {{ BsForm::resource('services::galleries')->post(route('dashboard.galleries.store'), ['files' => true,'data-parsley-validate']) }}
        @component('dashboard::layouts.components.box')
            @slot('title', trans('services::galleries.actions.create'))

            @include('services::galleries.partials.form')

            @slot('footer')
                {{ BsForm::submit()->label(trans('services::galleries.actions.save')) }}
            @endslot
        @endcomponent
        {{ BsForm::close() }}

    @endcomponent
@endsection
