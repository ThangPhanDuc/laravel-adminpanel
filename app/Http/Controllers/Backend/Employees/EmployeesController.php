<?php

namespace App\Http\Controllers\Backend\Employees;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\Employees\ManageEmployeesRequest;
use App\Http\Requests\Backend\Employees\CreateEmployeesRequest;
use App\Http\Requests\Backend\Employees\DeleteEmployeesRequest;
use App\Http\Requests\Backend\Employees\EditEmployeesRequest;
use App\Http\Requests\Backend\Employees\StoreEmployeesRequest;
use App\Http\Requests\Backend\Employees\UpdateEmployeesRequest;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Models\Employee;
use App\Repositories\Backend\EmployeesRepository;
use Illuminate\Support\Facades\View;
use App\Http\Responses\Backend\Employees\EditResponse;


class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $repository;
    public function __construct(EmployeesRepository $repository)
    {
        $this->repository = $repository;
        // View::share('js', ['employees']);
    }
    public function index(ManageEmployeesRequest $request)
    {
        return new ViewResponse('backend.employees.index');    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CreateEmployeesRequest $request)
    {
        return new ViewResponse('backend.employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeesRequest $request)
    {
        $this->repository->create($request->except(['_token', '_method']));

        return new RedirectResponse(route('admin.employees.index'), ['flash_success' => __('alerts.backend.employees.created')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ManageEmployeesRequest  $request, Employee $employee )
    {
        return new ViewResponse('backend.employees.show', ['employee' => $employee]);
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee, EditEmployeesRequest $request)
    {
        return new EditResponse($employee);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Employee $employee, UpdateEmployeesRequest $request)
    {
        $this->repository->update($employee, $request->except(['_token', '_method']));

        return new RedirectResponse(route('admin.employees.index'), ['flash_success' => __('alerts.backend.employees.updated')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee, DeleteEmployeesRequest $request)
    {
        $this->repository->delete($employee);

        return new RedirectResponse(route('admin.employees.index'), ['flash_success' => __('alerts.backend.employees.deleted')]);
    }
}
