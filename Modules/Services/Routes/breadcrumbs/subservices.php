<?php


Breadcrumbs::for('dashboard.subservices.create', function ($breadcrumb, $service) {
    $breadcrumb->parent('dashboard.services.show', $service);
    $breadcrumb->push(trans('services::subservices.actions.create'), route('dashboard.subservices.create', $service));
});

Breadcrumbs::for('dashboard.subservices.show', function ($breadcrumb, $item) {
    $breadcrumb->parent('dashboard.services.show', $item[0]);
    $breadcrumb->push($item[1]->name, route('dashboard.subservices.show', [$item[0], $item[1]]));
});

Breadcrumbs::for('dashboard.subservices.edit', function ($breadcrumb, $item) {
    $breadcrumb->parent('dashboard.services.show', $item[0]);
    $breadcrumb->push(trans('services::subservices.actions.edit'), route('dashboard.subservices.edit', [$item[0], $item[1]]));
});
