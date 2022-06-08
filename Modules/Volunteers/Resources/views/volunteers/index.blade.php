@extends('dashboard::layouts.default')

@section('title')
    @lang('volunteers::volunteers.plural')
@endsection

@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', trans('volunteers::volunteers.plural'))
        @slot('breadcrumbs', ['dashboard.volunteers.index'])

        @include('volunteers::volunteers.partials.filter')

        @component('dashboard::layouts.components.table-box')
            @slot('title', trans('volunteers::volunteers.actions.list'))
            @slot('tools')
                @include('volunteers::volunteers.partials.actions.create')
            @endslot

            <thead>
                <tr>
                    <th>@lang('volunteers::volunteers.attributes.name')</th>
                    <th>@lang('volunteers::volunteers.attributes.email')</th>
                    <th>@lang('volunteers::volunteers.attributes.phone')</th>
                    <th>@lang('volunteers::volunteers.attributes.address')</th>
                    <th style="width: 160px">...</th>
                </tr>
            </thead>
            <tbody>
                @forelse($volunteers as $volunteer)
                    <tr>
                        <td class="d-none d-md-table-cell">
                            {{ $volunteer->name }}
                        </td>
                        <td class="d-none d-md-table-cell">
                            {{ $volunteer->email }}
                        </td>
                        <td class="d-none d-md-table-cell">
                            {{ $volunteer->phone }}
                        </td>

                        <td style="width: 160px">
                            @include('volunteers::volunteers.partials.actions.show')
                            @include('volunteers::volunteers.partials.actions.edit')
                            @include('volunteers::volunteers.partials.actions.delete')
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="100" class="text-center">@lang('volunteers::volunteers.empty')</td>
                    </tr>
                @endforelse

                @if ($volunteers->hasPages())
                    @slot('footer')
                        {{ $volunteers->links() }}
                    @endslot
                @endif
            @endcomponent
        @endcomponent
    @endsection
