@extends('dashboard::layouts.default')

@section('title')
    {{ $gallery->service->name }}
@endsection
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', $gallery->service->name)
        @slot('breadcrumbs', ['dashboard.galleries.show', $gallery])

        <div class="row">
            <div class="col-md-6">
                @component('dashboard::layouts.components.box')
                    @slot('bodyClass', 'p-0')

                    <table class="table table-middle">
                        <tbody>
                        <tr>
                            <th width="400">@lang('services::galleries.attributes.image')</th>
                            <td>
                                <img src="{{ $gallery->getImage() }}"
                                     class="img img-size-">
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
