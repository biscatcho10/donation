@component('dashboard::layouts.components.table-box')
    @slot('title', trans('services::subservices.actions.list'))
    @slot('tools')
        @include('services::subservices.partials.actions.create')
    @endslot

    <thead>
        <tr>
            <th>@lang('services::subservices.attributes.image')</th>
            <th>@lang('services::subservices.attributes.name')</th>
            <th>@lang('services::subservices.attributes.description')</th>
            <th style="width: 160px">...</th>
        </tr>
    </thead>
    <tbody>
        @forelse($subservices as $sub_service)
            <tr>
                <td class="d-none d-md-table-cell">
                    <img src="{{ $sub_service->getImage() }}" class="img-circle img-size-64 mr-2">
                </td>
                <td>
                    {{ $sub_service->name }}
                    {{ $sub_service->description }}
                </td>
                <td style="width: 160px">
                    @include('services::subservices.partials.actions.show')
                    @include('services::subservices.partials.actions.edit')
                    @include('services::subservices.partials.actions.delete')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('services::subservices.empty')</td>
            </tr>
        @endforelse

        @if ($subservices->hasPages())
            @slot('footer')
                {{ $subservices->links() }}
            @endslot
        @endif
    @endcomponent
