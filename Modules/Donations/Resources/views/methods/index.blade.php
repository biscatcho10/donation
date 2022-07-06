@extends('dashboard::layouts.default')

@section('title')
    @lang('donations::methods.plural')
@endsection

@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', trans('donations::methods.plural'))
        @slot('breadcrumbs', ['dashboard.methods.index'])

        @include('donations::methods.partials.filter')

        @component('dashboard::layouts.components.table-box')
            @slot('title', trans('donations::methods.actions.list'))
            @slot('tools')
                @include('donations::methods.partials.actions.create')
            @endslot

            <thead>
                <tr>
                    <th>@lang('donations::methods.attributes.image')</th>
                    <th>@lang('donations::methods.attributes.name')</th>
                    <th style="width: 160px">...</th>
                </tr>
            </thead>
            <tbody>
                @forelse($methods as $method)
                    <tr>
                        <td class="d-none d-md-table-cell">
                            <img src="{{ $method->getImage() }}" alt="Product 1" class="img-circle img-size-32 mr-2"
                                style="height: 32px;">
                        </td>
                        <td class="d-none d-md-table-cell">
                            {{ $method->name }}
                        </td>

                        <td style="width: 160px">
                            @include('donations::methods.partials.actions.show')
                            @include('donations::methods.partials.actions.edit')
                            @include('donations::methods.partials.actions.delete')
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="100" class="text-center">@lang('donations::methods.empty')</td>
                    </tr>
                @endforelse

                @if ($methods->hasPages())
                    @slot('footer')
                        {{ $methods->links() }}
                    @endslot
                @endif
            @endcomponent
        @endcomponent
    @endsection
