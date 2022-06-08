@component('dashboard::layouts.components.sidebarItem')
    @slot('can', ['permission' => 'read_volunteers'])
    @slot('url', route('dashboard.volunteers.index'))
    @slot('name', trans('volunteers::volunteers.plural'))
    @slot('isActive', request()->routeIs('*volunteers*'))
    @slot('icon', 'fas fa-people-carry')
    @slot('tree', [
        [
            'name' => trans('volunteers::volunteers.actions.list'),
            'url' => route('dashboard.volunteers.index'),
            'can' => ['permission' => 'read_volunteers'],
            'isActive' => request()->routeIs('*volunteers.index'),
            'module' => 'volunteers',
        ],
        [
            'name' => trans('volunteers::volunteers.actions.create'),
            'url' => route('dashboard.volunteers.create'),
            'can' => ['permission' => 'create_volunteers'],
            'isActive' => request()->routeIs('*volunteers.create'),
            'module' => 'volunteers',
        ],
    ])
@endcomponent
