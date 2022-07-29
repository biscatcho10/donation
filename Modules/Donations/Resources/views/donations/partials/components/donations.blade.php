@component('dashboard::layouts.components.table-box')
    @slot('title', trans('donations::donations.plural'))
    @slot('tools')
    @endslot

    <thead>
        <tr>
            <th>@lang('donations::donations.attributes.donor')</th>
            <th>@lang('donations::donations.attributes.amount')</th>
            <th>@lang('donations::donations.attributes.type')</th>
            <th style="width: 160px">...</th>
        </tr>
    </thead>
    <tbody>
        @forelse($donations as $donation)
            <tr>
                <td class="d-none d-md-table-cell">
                    <a href="{{ route('dashboard.donors.show', $donation->donor->id) }}">
                        {{ $donation->donor->name }}
                    </a>
                </td>
                <td class="d-none d-md-table-cell">
                    {{ $donation->amount }}
                </td>
                <td class="d-none d-md-table-cell">
                    @php
                        $type = 'donations::donations.attributes.' . $donation->type;
                    @endphp
                    @if ($donation->type === 'online')
                        <span class="badge badge-success">{{ __($type) }}</span>
                    @else
                        <span class="badge badge-secondary">{{ __($type) }}</span>
                    @endif
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
