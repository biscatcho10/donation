<?php

Breadcrumbs::for('dashboard.news.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('news::news.plural'), route('dashboard.news.index'));
});

Breadcrumbs::for('dashboard.news.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.news.index');
    $breadcrumb->push(trans('news::news.actions.create'), route('dashboard.news.create'));
});

Breadcrumbs::for('dashboard.news.show', function ($breadcrumb, $news) {
    $breadcrumb->parent('dashboard.news.index');
    $breadcrumb->push($news->title, route('dashboard.news.show', $news));
});

Breadcrumbs::for('dashboard.news.edit', function ($breadcrumb, $news) {
    $breadcrumb->parent('dashboard.news.show', $news);
    $breadcrumb->push(trans('news::news.actions.edit'), route('dashboard.news.edit', $news));
});
