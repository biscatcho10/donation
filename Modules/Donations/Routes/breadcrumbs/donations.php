<?php

Breadcrumbs::for('dashboard.donations.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('donations::donations.plural'), route('dashboard.donations.index'));
});

Breadcrumbs::for('dashboard.donations.show', function ($breadcrumb, $donation) {
    $breadcrumb->parent('dashboard.donations.index');
    $breadcrumb->push($donation->donor->name, route('dashboard.donations.show', $donation));
});

