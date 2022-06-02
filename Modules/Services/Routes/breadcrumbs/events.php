<?php


Breadcrumbs::for('dashboard.events.create', function ($breadcrumb, $gallery) {
    $breadcrumb->parent('dashboard.galleries.show', $gallery);
    $breadcrumb->push(trans('services::events.actions.create'), route('dashboard.events.create', $gallery));
});

Breadcrumbs::for('dashboard.events.show', function ($breadcrumb, $item) {
    $breadcrumb->parent('dashboard.galleries.show', $item[0]);
    $breadcrumb->push($item[1]->name, route('dashboard.events.show', [$item[0], $item[1]]));
});

Breadcrumbs::for('dashboard.events.edit', function ($breadcrumb, $item) {
    $breadcrumb->parent('dashboard.galleries.show', $item[0]);
    $breadcrumb->push(trans('services::events.actions.edit'), route('dashboard.events.edit', [$item[0], $item[1]]));
});
