<?php

namespace App\Repositories\Backend;

use App\Events\Backend\Employees\EmployeeCreated;
use App\Events\Backend\Employees\EmployeeDeleted;
use App\Events\Backend\Employees\EmployeeUpdated;
use App\Exceptions\GeneralException;
use App\Models\Employee;
use App\Repositories\BaseRepository;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EmployeesRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Employee::class;

    protected $upload_path;

    /**
     * Sortable.
     *
     * @var array
     */
    private $sortable = [
        'id',
        'full_name',
        'phone_number',
        'position',
        'salary',
        'created_at',
        'updated_at',
    ];

    /**
     * Storage Class Object.
     *
     * @var \Illuminate\Support\Facades\Storage
     */
    protected $storage;

    public function __construct()
    {
        $this->upload_path = 'img' . DIRECTORY_SEPARATOR . 'employee' . DIRECTORY_SEPARATOR;
        $this->storage = Storage::disk('public');
    }

    /**
     * Retrieve List.
     *
     * @var array
     * @return Collection
     */
    public function retrieveList(array $options = [])
    {
        $perPage = isset($options['per_page']) ? (int) $options['per_page'] : 20;
        $orderBy = isset($options['order_by']) && in_array($options['order_by'], $this->sortable) ? $options['order_by'] : 'created_at';
        $order = isset($options['order']) && in_array($options['order'], ['asc', 'desc']) ? $options['order'] : 'desc';
        $query = $this->query()
            ->with([
                'owner',
                'updater',
            ])
            ->orderBy($orderBy, $order);

        if ($perPage == -1) {
            return $query->get();
        }

        return $query->paginate($perPage);
    }

    /**
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->query()

            ->select([
                'employees.id',
                'employees.full_name',
                'employees.phone_number',
                'employees.position',
                'employees.salary',
                'employees.created_at',
            ]);
    }

    /**
     * @param array $input
     *
     * @throws \App\Exceptions\GeneralException
     *
     * @return bool
     */
    public function create(array $input)
    {
        try {
            return DB::transaction(function () use ($input) {


                if ($employee = Employee::create($input)) {

                    event(new employeeCreated());

                    return $employee;
                }

                throw new GeneralException(__('exceptions.backend.employees.create_error'));
            });
        } catch (\Exception $e) {
            throw new GeneralException(__('exceptions.backend.employees.create_error'), $e->getCode(), $e);
        }
    }

    // /**
    //  * @param \App\Models\employee $employee
    //  * @param array $input
    //  */
    public function update(Employee $employee, array $input)
    {
        try {
            return DB::transaction(function () use ($employee, $input) {
                if ($employee->update($input)) {


                    event(new EmployeeUpdated());

                    return $employee->fresh();
                }

                throw new GeneralException(__('exceptions.backend.employees.update_error'));
            });
        } catch (\Exception $e) {
            throw new GeneralException(__('exceptions.backend.employees.update_error'), $e->getCode(), $e);
        }
    }


    // /**
    //  * @param \App\Models\employees\employee $employee
    //  *
    //  * @throws GeneralException
    //  *
    //  * @return bool
    //  */
    public function delete(Employee $employee)
    {
        try {
            DB::transaction(function () use ($employee) {
                if ($employee->delete()) {

                    event(new EmployeeDeleted());

                    return true;
                }

                throw new GeneralException(__('exceptions.backend.employees.delete_error'));
            });
        } catch (\Exception $e) {
            throw new GeneralException(__('exceptions.backend.employees.delete_error'), $e->getCode(), $e);
        }
    }
}
