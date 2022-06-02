@extends('dashboard::layouts.default')

@section('title')
    {{ $event->name }}
@endsection
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', $event->name)
        @slot('breadcrumbs', ['dashboard.events.show', [$gallery, $event]])

        <div class="row">
            <div class="col-md-12">
                @component('dashboard::layouts.components.box')
                    @slot('bodyClass', 'p-0')

                    <table class="table table-middle">
                        <tbody>
                        <tr>
                            <th width="400">@lang('services::events.attributes.name')</th>
                            <td>
                                {{ $event->name }}
                            </td>
                        </tr>
                        <tr>
                            <th width="400">@lang('services::events.attributes.description')</th>
                            <td>
                                {{ $event->description }}
                            </td>
                        </tr>
                        <tr>
                            <th width="400">@lang('services::events.attributes.image')</th>
                            <td>
                                @foreach ($event->images as $album)
                                    <img src="{{ $album['url'] }}" class="mr-2 img-thumbnail" style="width: 140px; height: 110px;">
                                @endforeach
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    @slot('footer')
                        @include('services::events.partials.actions.edit')
                        @include('services::events.partials.actions.delete')
                    @endslot
                @endcomponent
            </div>
        </div>

    @endcomponent
@endsection
