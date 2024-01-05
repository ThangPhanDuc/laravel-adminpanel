<?php

namespace App\Http\Controllers\Backend\Leaves;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\Leaves\ManageLeavesRequest;
use App\Repositories\Backend\LeavesRepository;
use Yajra\DataTables\Facades\DataTables;

class LeavesTableController extends Controller
{
    protected $repository;
    public function __construct(LeavesRepository $repository)  
    {
        $this->repository = $repository;
    }
    public function __invoke(ManageLeavesRequest $request)
    {
        return Datatables::of($this->repository->getForDataTable())
            ->escapeColumns(['user_id'])
            ->addColumn('user_id', function ($leaves) {
                return $leaves->user_name;
            })
            ->addColumn('leave_type', function ($leaves) {
                return $leaves->leave_type;
            })
            ->addColumn('start_date', function ($leaves) {
                return \Carbon\Carbon::parse($leaves->start_date)->format('d/m/Y');
            })
            ->addColumn('end_date', function ($leaves) {
                return \Carbon\Carbon::parse($leaves->end_date)->format('d/m/Y');
            })
            ->addColumn('status', function ($leaves) {
                return $leaves->status;
            })
            ->addColumn('created_at', function ($leaves) {
                return $leaves->created_at->toDateString();
            })
            ->addColumn('actions', function ($leaves) {
                return $leaves->action_buttons;
            })
            ->make(true);
    }
}
