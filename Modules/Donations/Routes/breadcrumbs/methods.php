<?php

Breadcrumbs::for('dashboard.methods.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('donations::methods.plural'), route('dashboard.donation-methods.index'));
});

Breadcrumbs::for('dashboard.methods.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.methods.index');
    $breadcrumb->push(trans('donations::methods.actions.create'), route('dashboard.donation-methods.create'));
});

Breadcrumbs::for('dashboard.methods.show', function ($breadcrumb, $method) {
    $breadcrumb->parent('dashboard.methods.index');
    $breadcrumb->push($method->name, route('dashboard.donation-methods.show', $method));
});

Breadcrumbs::for('dashboard.methods.edit', function ($breadcrumb, $method) {
    $breadcrumb->parent('dashboard.methods.show', $method);
    $breadcrumb->push(trans('donations::methods.actions.edit'), route('dashboard.donation-methods.edit', $method));
});
