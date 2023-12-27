<?php

Breadcrumbs::for('admin.employees.index', function ($trail) {
    $trail->push(__('labels.backend.access.employees.management'), route('admin.employees.index'));
});

Breadcrumbs::for('admin.employees.create', function ($trail) {
    $trail->parent('admin.employees.index');
    $trail->push(__('labels.backend.access.employees.management'), route('admin.employees.create'));
});

Breadcrumbs::for('admin.employees.edit', function ($trail, $id) {
    $trail->parent('admin.employees.index');
    $trail->push(__('labels.backend.access.employees.management'), route('admin.employees.edit', $id));
});

Breadcrumbs::for('admin.employees.show', function ($trail, $id) {
    $trail->parent('admin.employees.index');
    $trail->push(__('labels.backend.access.employees.management'), route('admin.employees.show', $id));
});
