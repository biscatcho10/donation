@extends('dashboard::layouts.default')

@section('title')
    {{ $gallery->name }}
@endsection
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', $gallery->name)
        @slot('breadcrumbs', ['dashboard.galleries.show', $gallery])

        <div class="row">
            <div class="col-md-12">
                @component('dashboard::layouts.components.box')
                    @slot('bodyClass', 'p-0')

                    <table class="table table-middle">
                        <tbody>
                            <tr>
                                <th width="400">@lang('services::galleries.attributes.name')</th>
                                <td>
                                    {{ $gallery->name }}
                                </td>
                            </tr>
                            <tr>
                                <th width="400">@lang('services::galleries.attributes.description')</th>
                                <td>
                                    {{ $gallery->description }}
                                </td>
                            </tr>
                            <tr>
                                <th width="400">@lang('services::galleries.attributes.image')</th>
                                <td>
                                    @foreach ($gallery->images as $album)
                                        <img src="{{ $album['url'] }}" class="mr-2 img-thumbnail"
                                            style="width: 140px; height: 110px;">
                                    @endforeach
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    @slot('footer')
                        @include('services::galleries.partials.actions.edit')
                        @include('services::galleries.partials.actions.delete')
                    @endslot
                @endcomponent
            </div>
        </div>
    @endcomponent

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
@endsection
