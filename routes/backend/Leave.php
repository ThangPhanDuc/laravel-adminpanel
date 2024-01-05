<?php

Route::group(['namespace' => 'Leaves'], function () {
    Route::get('/leaves', 'LeavesController@index')->name('leaves.index');
    Route::get('/leaves/create', 'LeavesController@create')->name('leaves.create'); 
    Route::post('/leaves', 'LeavesController@store')->name('leaves.store'); 
    Route::get('/leaves/{leave}', 'LeavesController@show')->name('leaves.show');

    Route::patch('/leaves/{leave}/{action}', 'LeavesController@process')->name('leaves.process');
   
    Route::post('/leaves/get', 'LeavesTableController')->name('leaves.get');
});
