@extends('dashboard::layouts.default')

@section('title')
    {{ $gallery->name }}
@endsection

@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', $gallery->name)
        @slot('breadcrumbs', ['dashboard.galleries.edit', $gallery])

        {{ BsForm::resource('services::galleries')->putModel($gallery, route('dashboard.galleries.update', $gallery), ['files' => true,'data-parsley-validate']) }}
        @component('dashboard::layouts.components.box')
            @slot('title', trans('services::galleries.actions.edit'))

            @include('services::galleries.partials.form')

            @slot('footer')
                {{ BsForm::submit()->label(trans('services::galleries.actions.save')) }}
            @endslot
        @endcomponent
        {{ BsForm::close() }}

    @endcomponent
@endsection
