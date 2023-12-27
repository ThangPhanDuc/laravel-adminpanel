<?php

namespace App\Http\Controllers\Backend\Employees;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\Employees\ManageEmployeesRequest;
use App\Repositories\Backend\EmployeesRepository;
use Yajra\DataTables\Facades\DataTables;

class EmployeesTableController extends Controller
{
    protected $repository;

    public function __construct(EmployeesRepository $repository)  
    {
        $this->repository = $repository;
    }

    public function __invoke(EmployeesRepository $request)
    {
        return Datatables::of($this->repository->getForDataTable())
            ->escapeColumns(['full_name'])
            ->addColumn('full_name', function ($employees) {
                return $employees->full_name;
            })
            ->addColumn('phone_number', function ($employees) {
                return $employees->phone_number;
            })
            ->addColumn('position', function ($employees) {
                return $employees->position;
            })
            ->addColumn('salary', function ($employees) {
                return $employees->salary;
            })
            ->addColumn('created_at', function ($employees) {
                return $employees->created_at->toDateString();
            })
            ->addColumn('actions', function ($employees) {
                return $employees->action_buttons;
            })
            ->make(true);
    }
}
