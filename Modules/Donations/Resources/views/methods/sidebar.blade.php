@component('dashboard::layouts.components.sidebarItem')
    @slot('can', ['permission' => 'read_methods'])
    @slot('url', route('dashboard.donation-methods.index'))
    @slot('name', trans('donations::methods.plural'))
    @slot('isActive', request()->routeIs('*donation-methods*'))
    @slot('icon', 'fas fa-credit-card')
    @slot('tree', [
        [
            'name' => trans('donations::methods.actions.list'),
            'url' => route('dashboard.donation-methods.index'),
            'can' => ['permission' => 'read_methods'],
            'isActive' => request()->routeIs('*donation-methods.index'),
            'module' => 'Donations',
        ],
        [
            'name' => trans('donations::methods.actions.create'),
            'url' => route('dashboard.donation-methods.create'),
            'can' => ['permission' => 'create_methods'],
            'isActive' => request()->routeIs('*donation-methods.create'),
            'module' => 'Donations',
        ],
    ])
@endcomponent
