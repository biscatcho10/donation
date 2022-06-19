@extends('dashboard::layouts.default')

@section('title')
    {{ $award->name }}
@endsection

@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', $award->name)
        @slot('breadcrumbs', ['dashboard.awards.edit', $award])

        {{ BsForm::resource('settings::awards')->putModel($award, route('dashboard.awards.update', $award), ['files' => true,'data-parsley-validate']) }}
        @component('dashboard::layouts.components.box')
            @slot('title', trans('settings::awards.actions.edit'))

            @include('settings::awards.partials.form')

            @slot('footer')
                {{ BsForm::submit()->label(trans('settings::awards.actions.save')) }}
            @endslot
        @endcomponent
        {{ BsForm::close() }}

    @endcomponent
@endsection
