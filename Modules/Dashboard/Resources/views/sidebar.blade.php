@component('dashboard::layouts.components.sidebarItem')
    @slot('url', route('dashboard.home'))
    @slot('name', trans('dashboard::dashboard.home'))
    @slot('icon', 'fas fa-layer-group')
    @slot('routeActive', 'dashboard.home')
@endcomponent
{{-- Admins --}}
@include('accounts::admins.sidebar')
{{-- Service --}}
@include('services::services.sidebar')
{{-- volunteers --}}
@include('volunteers::volunteers.sidebar')
{{-- Events --}}
{{-- Users --}}
{{-- @include('accounts::users.sidebar') --}}
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


