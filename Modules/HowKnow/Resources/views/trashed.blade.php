@extends('dashboard::layouts.default')

@section('title')
    @lang('howknow::reasons.trashedplural')
@endsection

@section('content')
    @component('howknow::layouts.components.page')
        @slot('title', trans('howknow::reasons.trashedplural'))

        @slot('breadcrumbs', ['dashboard.reasons.trashed'])

        @include('howknow::partials.filter')

        @component('howknow::layouts.components.table-box')

            @slot('title', trans('howknow::reasons.actions.trashed'))

            @slot('tools')
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
                        <td>{{ $reason->description }}</td>
                        <td>{{ $reason->created_at->format('Y-m-d') }}</td>

                        <td style="width: 160px">
                            @include('howknow::partials.actions.restore')
                            @include('howknow::partials.actions.forcedelete')
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
