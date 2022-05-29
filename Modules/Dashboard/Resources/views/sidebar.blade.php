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
{{-- Cities --}}
{{-- Cities --}}
{{-- Products --}}
{{-- Products --}}
{{-- Products --}}
{{-- Roles --}}
{{--patients--}}
{{-- @include('dashboard::sidebar.patients') --}}
{{--services--}}
{{-- @include('dashboard::sidebar.services') --}}
{{--packages--}}
{{-- @include('dashboard::sidebar.packages') --}}
{{--hr--}}
{{-- @include('dashboard::sidebar.hr') --}}
{{--users--}}
{{--@include('dashboard::sidebar.users')--}}
{{--branches--}}
{{--@include('dashboard::sidebar.branches')--}}
{{--stocks--}}
{{-- @include('dashboard::sidebar.stocks') --}}
{{--settings--}}
@include('dashboard::sidebar.settings')



