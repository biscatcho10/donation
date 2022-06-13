@component('dashboard::layouts.components.sidebarItem')
    @slot('can', ['permission' => 'read_donors'])
    @slot('url', route('dashboard.donors.index'))
    @slot('name', trans('donations::donors.plural'))
    @slot('isActive', request()->routeIs('*donors*'))
    @slot('icon', 'fas fa-users')
    @slot('tree', [
        [
            'name' => trans('donations::donors.actions.list'),
            'url' => route('dashboard.donors.index'),
            'can' => ['permission' => 'read_donors'],
            'isActive' => request()->routeIs('*donors.index'),
            'module' => 'Donations',
        ],
        [
            'name' => trans('donations::donors.actions.create'),
            'url' => route('dashboard.donors.create'),
            'can' => ['permission' => 'create_donors'],
            'isActive' => request()->routeIs('*donors.create'),
            'module' => 'Donations',
        ],
    ])
@endcomponent
