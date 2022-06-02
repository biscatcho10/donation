@extends('dashboard::layouts.default')

@section('title')
    @lang('services::events.plural')
@endsection

@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', trans('services::events.plural'))
        @slot('breadcrumbs', ['dashboard.services.index'])

        @include('services::events.partials.filter')

        @component('dashboard::layouts.components.table-box')
            @slot('title', trans('services::events.actions.list'))
            @slot('tools')
                @include('services::events.partials.actions.create')
            @endslot

            <thead>
                <tr>
                    <th>@lang('services::events.attributes.image')</th>
                    <th>@lang('services::events.attributes.name')</th>
                    <th>@lang('services::events.attributes.description')</th>
                    <th style="width: 160px">...</th>
                </tr>
            </thead>
            <tbody>
                @forelse($events as $event)
                    <tr>
                        <td class="d-none d-md-table-cell">
                            <img src="{{ $event->getImage() }}" class="img-circle img-size-64 mr-2">
                        </td>
                        <td>
                            {{ $event->name }}
                            {{ $event->description }}
                        </td>
                        <td style="width: 160px">
                            @include('services::events.partials.actions.show')
                            @include('services::events.partials.actions.edit')
                            @include('services::events.partials.actions.delete')
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="100" class="text-center">@lang('services::events.empty')</td>
                    </tr>
                @endforelse

                @if ($events->hasPages())
                    @slot('footer')
                        {{ $events->links() }}
                    @endslot
                @endif
            @endcomponent
        @endcomponent
    @endsection
