@extends('dashboard::layouts.default')

@section('title')
    {{ $sub_service->name }}
@endsection
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', $sub_service->name)
        @slot('breadcrumbs', ['dashboard.subservices.show', [$service, $sub_service]])

        <div class="row">
            <div class="col-md-12">
                @component('dashboard::layouts.components.box')
                    @slot('bodyClass', 'p-0')

                    <table class="table table-middle">
                        <tbody>
                        <tr>
                            <th width="400">@lang('services::subservices.attributes.name')</th>
                            <td>
                                {{ $sub_service->name }}
                            </td>
                        </tr>
                        <tr>
                            <th width="400">@lang('services::subservices.attributes.description')</th>
                            <td>
                                {{ $sub_service->description }}
                            </td>
                        </tr>
                        <tr>
                            <th width="400">@lang('services::subservices.attributes.image')</th>
                            <td>
                                @foreach ($sub_service->images as $album)
                                    <img src="{{ $album['url'] }}" class="mr-2 img-thumbnail" style="width: 140px; height: 110px;">
                                @endforeach
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    @slot('footer')
                        @include('services::subservices.partials.actions.edit')
                        @include('services::subservices.partials.actions.delete')
                    @endslot
                @endcomponent
            </div>
        </div>

    @endcomponent
@endsection
