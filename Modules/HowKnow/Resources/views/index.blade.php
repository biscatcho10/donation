@extends('dashboard::layouts.default')

@section('title')
    @lang('howknow::reasons.plural')
@endsection

@section('content')
    @component('howknow::layouts.components.page')
        @slot('title', trans('howknow::reasons.plural'))

        @slot('breadcrumbs', ['dashboard.reasons.index'])

        @include('howknow::partials.filter')

        @component('howknow::layouts.components.table-box')
            @slot('title', trans('howknow::reasons.actions.list'))

            @slot('tools')

                {{-- @include('howknow::partials.actions.trashed') --}}
                @include('howknow::partials.actions.create')
            @endslot

            <thead>
                <tr>
                    <th>@lang('howknow::reasons.attributes.reason')</th>
                    <th>@lang('howknow::reasons.attributes.created_at')</th>
                    <th style="width: 160px">...</th>
                </tr>
            </thead>
            <tbody>
                @forelse($reasons as $reason)
                    <tr>
                        <td class="d-none d-md-table-cell">
                            {{ $reason->reason }}
                        </td>
                        <td>{{ $reason->created_at->format('Y-m-d') }}</td>

                        <td style="width: 160px">
                            @include('howknow::partials.actions.show')
                            @include('howknow::partials.actions.edit')
                            @include('howknow::partials.actions.delete')
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="100" class="text-center">@lang('howknow::reasons.empty')</td>
                    </tr>
                @endforelse

                @if ($reasons->hasPages())
                    @slot('footer')
                        {{ $reasons->links() }}
                    @endslot
                @endif
            @endcomponent
        @endcomponent
    @endsection
