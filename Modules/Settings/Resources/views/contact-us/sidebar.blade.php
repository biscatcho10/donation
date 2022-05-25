@component('dashboard::layouts.components.sidebarItem')
    @slot('can', ['permission' => 'read_contactus'])
    @slot('url', route('dashboard.contact-us.index'))
    @slot('name', trans('settings::contactus.plural'))
    @slot('isActive', request()->routeIs('*contact-us*'))
    @slot('icon', 'fas fa-envelope')
    @slot('tree', [
        [
            'name' => trans('settings::contactus.actions.list'),
            'url' => route('dashboard.contact-us.index'),
            'can' => ['permission' => 'read_partners'],
            'isActive' => request()->routeIs('*partners.index'),
            'module' => 'Settings',
        ]
    ])
@endcomponent
