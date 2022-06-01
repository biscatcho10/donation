@extends('dashboard::layouts.default')

@section('title')
    {{ $gallery->name }}
@endsection
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', $gallery->name)
        @slot('breadcrumbs', ['dashboard.galleries.show', $gallery])

        <div class="row">
            <div class="col-md-12">
                @component('dashboard::layouts.components.box')
                    @slot('bodyClass', 'p-0')

                    <table class="table table-middle">
                        <tbody>
                        <tr>
                            <th width="400">@lang('services::galleries.attributes.name')</th>
                            <td>
                                {{ $gallery->name }}
                            </td>
                        </tr>
                        <tr>
                            <th width="400">@lang('services::galleries.attributes.description')</th>
                            <td>
                                {{ $gallery->description }}
                            </td>
                        </tr>
                        <tr>
                            <th width="400">@lang('services::galleries.attributes.image')</th>
                            <td>
                                @foreach ($gallery->images as $album)
                                    <img src="{{ $album['url'] }}" class="img-circle img-size-64 mr-2">
                                @endforeach
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    @slot('footer')
                        @include('services::galleries.partials.actions.edit')
                        @include('services::galleries.partials.actions.delete')
                    @endslot
                @endcomponent
            </div>
        </div>

    @endcomponent
@endsection
