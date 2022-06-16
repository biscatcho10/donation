@extends('dashboard::layouts.default')

@section('title')
    {{ $donor->name }}
@endsection
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', $donor->name)
        @slot('breadcrumbs', ['dashboard.donors.show', $donor])

        <div class="row">
            <div class="col-md-6">
                @component('dashboard::layouts.components.box')
                    @slot('bodyClass', 'p-0')

                    <table class="table table-middle">
                        <tbody>
                        <tr>
                            <th width="200">@lang('donations::donors.attributes.name')</th>
                            <td>{{ $donor->name }}</td>
                        </tr>
                        <tr>
                            <th width="200">@lang('donations::donors.attributes.email')</th>
                            <td>{{ $donor->email }}</td>
                        </tr>
                        <tr>
                            <th width="200">@lang('donations::donors.attributes.phone')</th>
                            <td>{{ $donor->phone }}</td>
                        </tr>
                        </tbody>
                    </table>

                    @slot('footer')
                        @include('donations::donors.partials.actions.edit')
                        @include('donations::donors.partials.actions.delete')
                    @endslot
                @endcomponent
            </div>
        </div>

    @endcomponent

    @include('donations::donations.partials.components.donations')
@endsection
