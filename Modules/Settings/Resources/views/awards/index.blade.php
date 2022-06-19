@extends('dashboard::layouts.default')

@section('title')
    @lang('settings::awards.plural')
@endsection

@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', trans('settings::awards.plural'))
        @slot('breadcrumbs', ['dashboard.awards.index'])

        @include('settings::awards.partials.filter')

        @component('dashboard::layouts.components.table-box')
            @slot('title', trans('settings::awards.actions.list'))
            @slot('tools')
                @include('settings::awards.partials.actions.create')
            @endslot

            <thead>
                <tr>
                    <th>@lang('settings::awards.attributes.image')</th>
                    <th>@lang('settings::awards.attributes.name')</th>
                    <th>@lang('settings::awards.attributes.date')</th>
                    <th style="width: 160px">...</th>
                </tr>
            </thead>
            <tbody>
                @forelse($awards as $award)
                    <tr>
                        <td class="d-none d-md-table-cell">
                            <img src="{{ $award->getImage() }}" alt="Product 1" class="img-circle img-size-32 mr-2"
                                style="height: 32px;">
                        </td>
                        <td class="d-none d-md-table-cell">
                            {{ $award->name }}
                        </td>
                        <td class="d-none d-md-table-cell">
                            {{ $award->date }}
                        </td>

                        <td style="width: 160px">
                            @include('settings::awards.partials.actions.show')
                            @include('settings::awards.partials.actions.edit')
                            @include('settings::awards.partials.actions.delete')
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="100" class="text-center">@lang('settings::awards.empty')</td>
                    </tr>
                @endforelse

                @if ($awards->hasPages())
                    @slot('footer')
                        {{ $awards->links() }}
                    @endslot
                @endif
            @endcomponent
        @endcomponent
    @endsection
