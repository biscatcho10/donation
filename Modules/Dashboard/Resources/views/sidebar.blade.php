@component('dashboard::layouts.components.sidebarItem')
    @slot('url', route('dashboard.home'))
    @slot('name', trans('dashboard::dashboard.home'))
    @slot('icon', 'fas fa-layer-group')
    @slot('routeActive', 'dashboard.home')
@endcomponent
{{-- Admins --}}
@include('accounts::admins.sidebar')
{{-- Donors --}}
@include('donations::donors.sidebar')
{{-- volunteers --}}
@include('volunteers::volunteers.sidebar')
{{-- Service --}}
@include('services::services.sidebar')
{{-- Partners --}}
@include('partners::partners.sidebar')
{{-- News --}}
@include('news::news.sidebar')
{{-- Galleries --}}
@include('services::galleries.sidebar')
{{-- Countries --}}
@include('countries::sidebar')
{{-- Contact Us --}}
@include('settings::contact-us.sidebar')
{{--settings--}}
@include('dashboard::sidebar.settings')


