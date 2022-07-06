@extends('dashboard::layouts.default')

@section('title')
    {{ $method->name }}
@endsection

@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', $method->name)
        @slot('breadcrumbs', ['dashboard.methods.edit', $method])

        {{ BsForm::resource('donations::methods')->putModel($method, route('dashboard.donation-methods.update', $method), ['files' => true,'data-parsley-validate']) }}
        @component('dashboard::layouts.components.box')
            @slot('title', trans('donations::methods.actions.edit'))

            @include('donations::methods.partials.form')

            @slot('footer')
                {{ BsForm::submit()->label(trans('donations::methods.actions.save')) }}
            @endslot
        @endcomponent
        {{ BsForm::close() }}

    @endcomponent
@endsection
