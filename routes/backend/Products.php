<?php

// Products Management
Route::group(['namespace' => 'Products'], function () {
    Route::resource('products', 'ProductsController');

    // //For DataTables
    Route::post('products/get', 'ProductsTableController')
        ->name('products.get');
});
