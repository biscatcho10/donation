<?php

Breadcrumbs::for('dashboard.partners.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('partners::partners.plural'), route('dashboard.partners.index'));
});

Breadcrumbs::for('dashboard.partners.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.partners.index');
    $breadcrumb->push(trans('partners::partners.actions.create'), route('dashboard.partners.create'));
});

Breadcrumbs::for('dashboard.partners.show', function ($breadcrumb, $partner) {
    $breadcrumb->parent('dashboard.partners.index');
    $breadcrumb->push($partner->name, route('dashboard.partners.show', $partner));
});

Breadcrumbs::for('dashboard.partners.edit', function ($breadcrumb, $partner) {
    $breadcrumb->parent('dashboard.partners.show', $partner);
    $breadcrumb->push(trans('partners::partners.actions.edit'), route('dashboard.partners.edit', $partner));
});
