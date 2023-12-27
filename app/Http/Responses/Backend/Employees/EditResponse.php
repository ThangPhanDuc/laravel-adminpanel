<?php

namespace App\Http\Responses\Backend\Employees;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    protected $employee;

    public function __construct($employee)
    {
        $this->employee = $employee;
    }

    public function toResponse($request)
    {
        return view('backend.employees.edit')->with([
            'employee' => $this->employee,
        ]);
    }
}
