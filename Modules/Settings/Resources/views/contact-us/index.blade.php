@extends('dashboard::layouts.default')

@section('title')
    @lang('settings::contactus.plural')
@endsection

@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', trans('settings::contactus.plural'))
        @slot('breadcrumbs', ['dashboard.contactus.index'])

        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        @component('dashboard::layouts.components.table-box')
            @slot('title', trans('settings::contactus.actions.list'))

            <thead>
                <tr>
                    <th>@lang('settings::contactus.attributes.name')</th>
                    <th>@lang('settings::contactus.attributes.email')</th>
                    <th>@lang('settings::contactus.attributes.message')</th>
                    <th style="width: 160px">...</th>
                </tr>
            </thead>
            <tbody>
                @forelse($data as $contact)
                    <tr>
                        <td class="d-none d-md-table-cell">
                            {{ $contact->name }}
                        </td>
                        <td class="d-none d-md-table-cell">
                            {{ $contact->email }}
                        </td>
                        <td class="d-none d-md-table-cell">
                            {{ $contact->message }}
                        </td>

                        <td style="width: 160px">
                            @include('settings::contact-us.actions.show')
                            @include('settings::contact-us.actions.delete')
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="100" class="text-center">@lang('settings::contactus.empty')</td>
                    </tr>
                @endforelse

                @if ($data->hasPages())
                    @slot('footer')
                        {{ $data->links() }}
                    @endslot
                @endif
            @endcomponent
        @endcomponent
    @endsection
