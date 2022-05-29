@component('dashboard::layouts.components.sidebarItem')
    @slot('can', ['permission' => 'read_galleries'])
    @slot('url', route('dashboard.galleries.index'))
    @slot('name', trans('services::galleries.plural'))
    @slot('isActive', request()->routeIs('*services*'))
    @slot('icon', 'fas fa-images')
    @slot('tree', [
        [
            'name' => trans('services::galleries.actions.list'),
            'url' => route('dashboard.galleries.index'),
            'can' => ['permission' => 'read_galleries'],
            'isActive' => request()->routeIs('*galleries.index'),
            'module' => 'Services',
        ],
        [
            'name' => trans('services::galleries.actions.create'),
            'url' => route('dashboard.galleries.create'),
            'can' => ['permission' => 'create_galleries'],
            'isActive' => request()->routeIs('*galleries.create'),
            'module' => 'Services',
        ],
    ])
@endcomponent
