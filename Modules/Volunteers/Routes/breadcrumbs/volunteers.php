<?php

Breadcrumbs::for('dashboard.volunteers.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('volunteers::volunteers.plural'), route('dashboard.volunteers.index'));
});

Breadcrumbs::for('dashboard.volunteers.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.volunteers.index');
    $breadcrumb->push(trans('volunteers::volunteers.actions.create'), route('dashboard.volunteers.create'));
});

Breadcrumbs::for('dashboard.volunteers.show', function ($breadcrumb, $volunteer) {
    $breadcrumb->parent('dashboard.volunteers.index');
    $breadcrumb->push($volunteer->name, route('dashboard.volunteers.show', $volunteer));
});

Breadcrumbs::for('dashboard.volunteers.edit', function ($breadcrumb, $volunteer) {
    $breadcrumb->parent('dashboard.volunteers.show', $volunteer);
    $breadcrumb->push(trans('volunteers::volunteers.actions.edit'), route('dashboard.volunteers.edit', $volunteer));
});
