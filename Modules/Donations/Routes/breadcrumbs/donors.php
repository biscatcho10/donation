<?php

Breadcrumbs::for('dashboard.donors.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('donations::donors.plural'), route('dashboard.donors.index'));
});

Breadcrumbs::for('dashboard.donors.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.donors.index');
    $breadcrumb->push(trans('donations::donors.actions.create'), route('dashboard.donors.create'));
});

Breadcrumbs::for('dashboard.donors.show', function ($breadcrumb, $donor) {
    $breadcrumb->parent('dashboard.donors.index');
    $breadcrumb->push($donor->name, route('dashboard.donors.show', $donor));
});

Breadcrumbs::for('dashboard.donors.edit', function ($breadcrumb, $donor) {
    $breadcrumb->parent('dashboard.donors.show', $donor);
    $breadcrumb->push(trans('donations::donors.actions.edit'), route('dashboard.donors.edit', $donor));
});
