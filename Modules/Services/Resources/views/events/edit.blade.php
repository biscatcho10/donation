@extends('dashboard::layouts.default')

@section('title')
    {{ $event->name }}
@endsection

@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', $event->name)
        @slot('breadcrumbs', ['dashboard.events.edit', [$gallery, $event]])

        {{ BsForm::resource('services::events')->putModel($event, route('dashboard.events.update', [$gallery, $event]), ['files' => true,'data-parsley-validate']) }}
        @component('dashboard::layouts.components.box')
            @slot('title', trans('services::events.actions.edit'))

            @include('services::events.partials.form')

            @slot('footer')
                {{ BsForm::submit()->label(trans('services::events.actions.save')) }}
            @endslot
        @endcomponent
        {{ BsForm::close() }}

    @endcomponent
@endsection
