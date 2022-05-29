<?php

Breadcrumbs::for('dashboard.galleries.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('services::galleries.plural'), route('dashboard.galleries.index'));
});

Breadcrumbs::for('dashboard.galleries.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.galleries.index');
    $breadcrumb->push(trans('services::galleries.actions.create'), route('dashboard.galleries.create'));
});

Breadcrumbs::for('dashboard.galleries.show', function ($breadcrumb, $gallery) {
    $breadcrumb->parent('dashboard.galleries.index');
    $breadcrumb->push($gallery->service->name, route('dashboard.galleries.show', $gallery));
});

Breadcrumbs::for('dashboard.galleries.edit', function ($breadcrumb, $gallery) {
    $breadcrumb->parent('dashboard.galleries.show', $gallery);
    $breadcrumb->push(trans('services::galleries.actions.edit'), route('dashboard.galleries.edit', $gallery));
});
