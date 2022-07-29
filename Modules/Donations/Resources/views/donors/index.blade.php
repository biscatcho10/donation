@extends('dashboard::layouts.default')

@section('title')
    @lang('donations::donors.plural')
@endsection

@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', trans('donations::donors.plural'))
        @slot('breadcrumbs', ['dashboard.donors.index'])

        @include('donations::donors.partials.filter')

        @component('dashboard::layouts.components.table-box')
            @slot('title', trans('donations::donors.actions.list'))
            @slot('tools')
                @include('donations::donors.partials.actions.create')
            @endslot

            <thead>
                <tr>
                    <th>@lang('donations::donors.attributes.name')</th>
                    <th>@lang('donations::donors.attributes.email')</th>
                    <th>@lang('donations::donors.attributes.phone')</th>
                    <th style="width: 160px">...</th>
                </tr>
            </thead>
            <tbody>
                @forelse($donors as $donor)
                    <tr>
                        <td class="d-none d-md-table-cell">
                            {{ $donor->name }}
                        </td>
                        <td class="d-none d-md-table-cell">
                            {{ $donor->email ?? '---' }}
                        </td>
                        <td class="d-none d-md-table-cell">
                            {{ $donor->phone ?? '---' }}
                        </td>

                        <td style="width: 160px">
                            @include('donations::donors.partials.actions.show')
                            @include('donations::donors.partials.actions.edit')
                            @include('donations::donors.partials.actions.delete')
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="100" class="text-center">@lang('donations::donors.empty')</td>
                    </tr>
                @endforelse

                @if ($donors->hasPages())
                    @slot('footer')
                        {{ $donors->links() }}
                    @endslot
                @endif
            @endcomponent
        @endcomponent
    @endsection
