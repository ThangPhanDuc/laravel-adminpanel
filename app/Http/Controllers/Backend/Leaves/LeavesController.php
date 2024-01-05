<?php

namespace App\Http\Controllers\Backend\Leaves;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\Leaves\ManageLeavesRequest;
use App\Http\Requests\Backend\Leaves\CreateLeavesRequest;
use App\Http\Requests\Backend\Leaves\StoreLeavesRequest;
use App\Http\Requests\Backend\Leaves\UpdateLeavesRequest;
use App\Repositories\Backend\LeavesRepository;
use App\Http\Responses\ViewResponse;
use Illuminate\Support\Facades\View;
use App\Models\Leave;
use App\Http\Responses\RedirectResponse;

class LeavesController extends Controller
{

    protected $repository;
    public function __construct(LeavesRepository $repository)
    {
        $this->repository = $repository;
        View::share('js', ['leaves']);
    }
    public function index(ManageLeavesRequest $request)
    {
        return new ViewResponse('backend.leaves.index');
    }

    public function show(ManageLeavesRequest  $request, Leave $leave)
    {

        $data = $this->repository->show($leave, $request->except(['_token', '_method']));

        $isHRManager = $data['isHRManager'];
        $isDepartmentHead = $data['isDepartmentHead'];

        return new ViewResponse('backend.leaves.show', [
            'leave' => $leave,
            'isHRManager' => $isHRManager,
            'isDepartmentHead' => $isDepartmentHead,
        ]);
    }

    public function create(CreateLeavesRequest $request)
    {
        return new ViewResponse('backend.leaves.create');
    }

    public function store(StoreLeavesRequest $request)
    {

        $this->repository->create($request->except(['_token', '_method']));

        return new RedirectResponse(route('admin.leaves.index'), ['flash_success' => __('alerts.backend.leaves.created')]);
    }


    public function process(Leave $leave, UpdateLeavesRequest $request)
    {
        $this->repository->update($leave, $request->action);

        return new RedirectResponse(route('admin.leaves.index'), ['flash_success' => __('alerts.backend.blogs.updated')]);
    }
}
