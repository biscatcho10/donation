@extends('dashboard::layouts.default')

@section('title')
    @lang('donations::donations.plural')
@endsection

@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', trans('donations::donations.plural'))
        @slot('breadcrumbs', ['dashboard.donations.index'])

        @include('donations::donations.partials.filter')

        @include('donations::donations.partials.components.donations')
    @endcomponent
@endsection
