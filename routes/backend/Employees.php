<?php


Route::group(['namespace' => 'Employees'], function () {
    Route::resource('employees', 'EmployeesController' );

    //For DataTables
    Route::post('employees/get', 'EmployeesTableController')
        ->name('employees.get');
});
