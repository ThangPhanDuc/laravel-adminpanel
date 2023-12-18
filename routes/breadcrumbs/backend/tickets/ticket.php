<?php

Breadcrumbs::for('admin.tickets.index', function ($trail) {
    $trail->push(__('labels.backend.access.tickets.management'), route('admin.tickets.index'));
});

Breadcrumbs::for('admin.tickets.create', function ($trail) {
    $trail->parent('admin.tickets.index');
    $trail->push(__('labels.backend.access.tickets.management'), route('admin.tickets.create'));
});

Breadcrumbs::for('admin.tickets.edit', function ($trail, $id) {
    $trail->parent('admin.tickets.index');
    $trail->push(__('labels.backend.access.tickets.management'), route('admin.tickets.edit', $id));
});
