<?php

// Products Management
Route::group(['namespace' => 'Products'], function () {
    Route::resource('products', 'ProductsController', ['except' => ['show']]);

    // //For DataTables
    Route::post('products/get', 'ProductsTableController')
        ->name('products.get');
});
