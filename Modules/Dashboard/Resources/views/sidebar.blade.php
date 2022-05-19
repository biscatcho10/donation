@component('dashboard::layouts.components.sidebarItem')
    @slot('url', route('dashboard.home'))
    @slot('name', trans('dashboard::dashboard.home'))
    @slot('icon', 'fas fa-layer-group')
    @slot('routeActive', 'dashboard.home')
@endcomponent
{{-- Admins --}}
@include('accounts::admins.sidebar')
{{-- Users --}}
@include('accounts::users.sidebar')
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



