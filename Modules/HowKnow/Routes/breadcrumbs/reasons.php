<?php


Breadcrumbs::for('dashboard.reasons.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('howknow::reasons.plural'), route('dashboard.reasons.index'));
});

Breadcrumbs::for('dashboard.reasons.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.reasons.index');
    $breadcrumb->push(trans('howknow::reasons.actions.create'), route('dashboard.reasons.create'));
});

Breadcrumbs::for('dashboard.reasons.show', function ($breadcrumb, $reason) {
    $breadcrumb->parent('dashboard.reasons.index');
    $breadcrumb->push($reason->reason, route('dashboard.reasons.show', $reason));
});

Breadcrumbs::for('dashboard.reasons.edit', function ($breadcrumb, $reason) {
    $breadcrumb->parent('dashboard.reasons.show', $reason);
    $breadcrumb->push(trans('howknow::reasons.actions.edit'), route('dashboard.reasons.edit', $reason));
});

Breadcrumbs::for('dashboard.reasons.trashed', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.reasons.index');
    $breadcrumb->push(trans('howknow::reasons.trashedplural'), route('dashboard.reasons.trashed'));
});
