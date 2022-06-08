@extends('dashboard::layouts.default')

@section('title')
    {{ $volunteer->name }}
@endsection

@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', $volunteer->name)
        @slot('breadcrumbs', ['dashboard.volunteers.edit', $volunteer])

        {{ BsForm::resource('volunteers::volunteers')->putModel($volunteer, route('dashboard.volunteers.update', $volunteer), ['files' => true,'data-parsley-validate']) }}
        @component('dashboard::layouts.components.box')
            @slot('title', trans('volunteers::volunteers.actions.edit'))

            @include('volunteers::volunteers.partials.form')

            @slot('footer')
                {{ BsForm::submit()->label(trans('volunteers::volunteers.actions.save')) }}
            @endslot
        @endcomponent
        {{ BsForm::close() }}

    @endcomponent
@endsection
