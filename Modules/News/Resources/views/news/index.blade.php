@extends('dashboard::layouts.default')

@section('title')
    @lang('news::news.plural')
@endsection

@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', trans('news::news.plural'))
        @slot('breadcrumbs', ['dashboard.news.index'])

        @include('news::news.partials.filter')

        @component('dashboard::layouts.components.table-box')
            @slot('title', trans('news::news.actions.list'))
            @slot('tools')
                @include('news::news.partials.actions.create')
            @endslot

            <thead>
                <tr>
                    <th>@lang('news::news.attributes.image')</th>
                    <th>@lang('news::news.attributes.title')</th>
                    <th>@lang('news::news.attributes.content')</th>
                    <th style="width: 160px">...</th>
                </tr>
            </thead>
            <tbody>
                @forelse($data as $news)
                    <tr>
                        <td class="d-none d-md-table-cell">
                            <img src="{{ $news->getImage() }}" alt="Product 1" class="img-circle img-size-32 mr-2"
                                style="height: 32px;">
                        </td>
                        <td class="d-none d-md-table-cell">
                            {{ $news->title }}
                        </td>
                        <td class="d-none d-md-table-cell">
                            {!! Str::limit($news->content, 80) !!}
                        </td>

                        <td style="width: 160px">
                            @include('news::news.partials.actions.show')
                            @include('news::news.partials.actions.edit')
                            @include('news::news.partials.actions.delete')
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="100" class="text-center">@lang('news::news.empty')</td>
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
