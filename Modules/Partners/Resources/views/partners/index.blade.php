@extends('dashboard::layouts.default')

@section('title')
    @lang('partners::partners.plural')
@endsection

@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', trans('partners::partners.plural'))
        @slot('breadcrumbs', ['dashboard.partners.index'])

        @include('partners::partners.partials.filter')

        @component('dashboard::layouts.components.table-box')
            @slot('title', trans('partners::partners.actions.list'))
            @slot('tools')
                @include('partners::partners.partials.actions.create')
            @endslot

            <thead>
                <tr>
                    <th>@lang('partners::partners.attributes.image')</th>
                    <th>@lang('partners::partners.attributes.name')</th>
                    <th style="width: 160px">...</th>
                </tr>
            </thead>
            <tbody>
                @forelse($partners as $partner)
                    <tr>
                        <td class="d-none d-md-table-cell">
                            <img src="{{ $partner->getImage() }}" alt="Product 1" class="img-circle img-size-32 mr-2"
                                style="height: 32px;">
                        </td>
                        <td class="d-none d-md-table-cell">
                            {{ $partner->name }}
                        </td>

                        <td style="width: 160px">
                            @include('partners::partners.partials.actions.show')
                            @include('partners::partners.partials.actions.edit')
                            @include('partners::partners.partials.actions.delete')
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="100" class="text-center">@lang('partners::partners.empty')</td>
                    </tr>
                @endforelse

                @if ($partners->hasPages())
                    @slot('footer')
                        {{ $partners->links() }}
                    @endslot
                @endif
            @endcomponent
        @endcomponent
    @endsection
