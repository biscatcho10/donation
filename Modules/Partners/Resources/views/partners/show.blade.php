@extends('dashboard::layouts.default')

@section('title')
    {{ $partner->name }}
@endsection
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', $partner->name)
        @slot('breadcrumbs', ['dashboard.partners.show', $partner])

        <div class="row">
            <div class="col-md-6">
                @component('dashboard::layouts.components.box')
                    @slot('bodyClass', 'p-0')

                    <table class="table table-middle">
                        <tbody>
                        <tr>
                            <th width="200">@lang('partners::partners.attributes.name')</th>
                            <td>{{ $partner->name }}</td>
                        </tr>
                        <tr>
                            <th width="200">@lang('partners::partners.attributes.image')</th>
                            <td>
                                <img src="{{ $partner->getImage() }}"
                                     class="img img-size-"
                                     alt="{{ $partner->name }}">
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    @slot('footer')
                        @include('partners::partners.partials.actions.edit')
                        @include('partners::partners.partials.actions.delete')
                    @endslot
                @endcomponent
            </div>
        </div>

    @endcomponent
@endsection
