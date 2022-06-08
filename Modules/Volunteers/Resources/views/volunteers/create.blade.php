@extends('dashboard::layouts.default')

@section('title')
    @lang('volunteers::volunteers.actions.create')
@endsection

@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', trans('volunteers::volunteers.plural'))
        @slot('breadcrumbs', ['dashboard.volunteers.create'])

        {{ BsForm::resource('volunteers::volunteers')->post(route('dashboard.volunteers.store'), ['files' => true,'data-parsley-validate']) }}
        @component('dashboard::layouts.components.box')
            @slot('title', trans('volunteers::volunteers.actions.create'))

            @include('volunteers::volunteers.partials.form')

            @slot('footer')
                {{ BsForm::submit()->label(trans('volunteers::volunteers.actions.save')) }}
            @endslot
        @endcomponent
        {{ BsForm::close() }}

    @endcomponent
@endsection
