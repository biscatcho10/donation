@extends('dashboard::layouts.default')

@section('title')
    @lang('donations::donations.plural')
@endsection

@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', trans('donations::donations.plural'))
        @slot('breadcrumbs', ['dashboard.donations.index'])

        @include('donations::donations.partials.filter')

        @component('dashboard::layouts.components.table-box')
            @slot('title', trans('donations::donations.actions.list'))
            @slot('tools')
            @endslot

            <thead>
                <tr>
                    <th>@lang('donations::donations.attributes.donor')</th>
                    <th>@lang('donations::donations.attributes.email')</th>
                    <th>@lang('donations::donations.attributes.amount')</th>
                    <th>@lang('donations::donations.attributes.type')</th>
                    <th>@lang('donations::donations.attributes.service')</th>
                    <th style="width: 160px">...</th>
                </tr>
            </thead>
            <tbody>
                @forelse($donations as $donation)
                    <tr>
                        <td class="d-none d-md-table-cell">
                            {{ $donation->donor->name }}
                        </td>
                        <td class="d-none d-md-table-cell">
                            {{ $donation->donor->email }}
                        </td>
                        <td class="d-none d-md-table-cell">
                            {{ $donation->amount }}
                        </td>
                        <td class="d-none d-md-table-cell">
                            {{ $donation->type }}
                        </td>
                        <td class="d-none d-md-table-cell">
                            {{ $donation->type == 'service' ? $donation->service->name : '...' }}
                        </td>

                        <td style="width: 160px">
                            @include('donations::donations.partials.actions.show')
                            @include('donations::donations.partials.actions.delete')
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="100" class="text-center">@lang('donations::donations.empty')</td>
                    </tr>
                @endforelse

                @if ($donations->hasPages())
                    @slot('footer')
                        {{ $donations->links() }}
                    @endslot
                @endif
            @endcomponent
        @endcomponent
    @endsection
