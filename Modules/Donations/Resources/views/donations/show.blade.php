@extends('dashboard::layouts.default')

@section('title')
    {{ $donation->donor->name }}
@endsection
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', $donation->donor->name)
        @slot('breadcrumbs', ['dashboard.donations.show', $donation])

        <div class="row">
            <div class="col-md-6">
                @component('dashboard::layouts.components.box')
                    @slot('bodyClass', 'p-0')

                    <table class="table table-middle">
                        <tbody>
                            <tr>
                                <th width="200">@lang('donations::donations.attributes.donor')</th>
                                <td>
                                    <a href="{{ route('dashboard.donors.show', $donation->donor->id) }}">
                                        {{ $donation->donor->name }}
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <th width="200">@lang('donations::donations.attributes.amount')</th>
                                <td>{{ $donation->amount }}</td>
                            </tr>
                            <tr>
                                <th width="200">@lang('donations::donations.attributes.type')</th>
                                <td>
                                    @php
                                        $type = 'donations::donations.attributes.' . $donation->type;
                                    @endphp
                                    @if ($donation->type === 'online')
                                        <span class="badge badge-soft-success font-size-12">{{ __($type) }}</span>
                                    @else
                                        <span class="badge badge-soft-danger font-size-12">{{ __($type) }}</span>
                                    @endif
                                </td>
                            </tr>
                            @if ($donation->type == 'special')
                                <tr>
                                    <th width="200">@lang('donations::donations.attributes.service')</th>
                                    <td>{{ $donation->service->name }}</td>
                                </tr>
                            @endif
                            <tr>
                                <th width="200">@lang('donations::donations.attributes.paid_at')</th>
                                <td>{{ $donation->paid_at }}</td>
                            </tr>
                        </tbody>
                    </table>

                    @slot('footer')
                        @include('donations::donations.partials.actions.delete')
                    @endslot
                @endcomponent
            </div>
        </div>
    @endcomponent
@endsection
