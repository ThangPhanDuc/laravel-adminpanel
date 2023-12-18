<?php

// Blogs Management
Route::group(['namespace' => 'Tickets'], function () {
    Route::resource('tickets', 'TicketsController');

    // For DataTables
    Route::post('tickets/get', 'TicketsTableController')
        ->name('tickets.get');
});
