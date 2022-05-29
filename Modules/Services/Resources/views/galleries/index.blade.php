@extends('dashboard::layouts.default')

@section('title')
    @lang('services::galleries.plural')
@endsection

@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', trans('services::galleries.plural'))
        @slot('breadcrumbs', ['dashboard.services.index'])

        @include('services::galleries.partials.filter')

        @component('dashboard::layouts.components.table-box')
            @slot('title', trans('services::galleries.actions.list'))
            @slot('tools')
                @include('services::galleries.partials.actions.create')
            @endslot

            <thead>
                <tr>
                    <th>@lang('services::galleries.attributes.image')</th>
                    <th>@lang('services::galleries.attributes.service')</th>
                    <th style="width: 160px">...</th>
                </tr>
            </thead>
            <tbody>
                @forelse($galleries as $gallery)
                    <tr>
                        <td class="d-none d-md-table-cell">
                            <img src="{{ $gallery->getImage() }}" class="img-circle img-size-64 mr-2">
                        </td>
                        <td>
                            <a href="{{ route('dashboard.services.show', $gallery->service) }}">
                                {{ $gallery->service->name }}
                            </a>
                        </td>
                        <td style="width: 160px">
                            @include('services::galleries.partials.actions.show')
                            @include('services::galleries.partials.actions.edit')
                            @include('services::galleries.partials.actions.delete')
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="100" class="text-center">@lang('services::galleries.empty')</td>
                    </tr>
                @endforelse

                @if ($galleries->hasPages())
                    @slot('footer')
                        {{ $galleries->links() }}
                    @endslot
                @endif
            @endcomponent
        @endcomponent
    @endsection
