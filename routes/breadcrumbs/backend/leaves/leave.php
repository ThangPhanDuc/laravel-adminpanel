<?php

Breadcrumbs::for('admin.leaves.index', function ($trail) {
    $trail->push(__('labels.backend.access.blogs.management'), route('admin.leaves.index'));
});

Breadcrumbs::for('admin.leaves.create', function ($trail) {
    $trail->parent('admin.leaves.index');
    $trail->push(__('labels.backend.access.leaves.management'), route('admin.leaves.create'));
});

Breadcrumbs::for('admin.leaves.show', function ($trail, $id) {
    $trail->parent('admin.leaves.index');
    $trail->push(__('labels.backend.access.leaves.management'), route('admin.leaves.show', $id));
});


