@component('dashboard::layouts.components.table-box')
    @slot('title', trans('donations::donations.plural'))
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
                    @php
                        $type = 'donations::donations.attributes.' . $donation->type;
                    @endphp
                    {{ __($type) }}
                </td>
                <td class="d-none d-md-table-cell">
                    {{ $donation->type == 'special' ? $donation->service->name : '...' }}
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
