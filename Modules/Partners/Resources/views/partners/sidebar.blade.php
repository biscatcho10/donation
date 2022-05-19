@component('dashboard::layouts.components.sidebarItem')
    @slot('can', ['permission' => 'read_partners'])
    @slot('url', route('dashboard.partners.index'))
    @slot('name', trans('partners::partners.plural'))
    @slot('isActive', request()->routeIs('*partners*'))
    @slot('icon', 'fas fa-handshake')
    @slot('tree', [
        [
            'name' => trans('partners::partners.actions.list'),
            'url' => route('dashboard.partners.index'),
            'can' => ['permission' => 'read_partners'],
            'isActive' => request()->routeIs('*partners.index'),
            'module' => 'Partners',
        ],
        [
            'name' => trans('partners::partners.actions.create'),
            'url' => route('dashboard.partners.create'),
            'can' => ['permission' => 'create_partners'],
            'isActive' => request()->routeIs('*partners.create'),
            'module' => 'Partners',
        ],
    ])
@endcomponent
