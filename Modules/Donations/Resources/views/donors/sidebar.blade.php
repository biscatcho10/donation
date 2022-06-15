@component('dashboard::layouts.components.sidebarItem')
    @slot('can', ['permission' => 'read_donors'])
    @slot('url', route('dashboard.donors.index'))
    @slot('name', trans('donations::donors.plural'))
    @slot('isActive', request()->routeIs('*donors*'))
    @slot('icon', 'fas fa-users')
    @slot('tree', [
        [
            'name' => trans('donations::donors.data'),
            'url' => route('dashboard.donation.data'),
            'isActive' => request()->routeIs('*donation.data'),
            'module' => 'Donations',
        ],
        [
            'name' => trans('donations::donations.plural'),
            'url' => route('dashboard.donations.index'),
            'can' => ['permission' => 'read_donations'],
            'isActive' => request()->routeIs('*donations.index'),
            'module' => 'Donations',
        ],
        [
            'name' => trans('donations::donors._plural'),
            'url' => route('dashboard.donors.index'),
            'can' => ['permission' => 'read_donors'],
            'isActive' => request()->routeIs('*donors.index'),
            'module' => 'Donations',
        ]
    ])
@endcomponent
