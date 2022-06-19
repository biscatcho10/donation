@component('dashboard::layouts.components.sidebarItem')
    @slot('can', ['permission' => 'read_awards'])
    @slot('url', route('dashboard.awards.index'))
    @slot('name', trans('settings::awards.plural'))
    @slot('isActive', request()->routeIs('*awards*'))
    @slot('icon', 'fas fa-handshake')
    @slot('tree', [
        [
            'name' => trans('settings::awards.actions.list'),
            'url' => route('dashboard.awards.index'),
            'can' => ['permission' => 'read_awards'],
            'isActive' => request()->routeIs('*awards.index'),
            'module' => 'Settings',
        ],
        [
            'name' => trans('settings::awards.actions.create'),
            'url' => route('dashboard.awards.create'),
            'can' => ['permission' => 'create_awards'],
            'isActive' => request()->routeIs('*awards.create'),
            'module' => 'Settings',
        ],
    ])
@endcomponent
