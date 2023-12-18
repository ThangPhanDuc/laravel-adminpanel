<?php

namespace App\Http\Controllers\Backend\Tickets;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\Backend\Tickets\ManageTicketsRequest;
use App\Repositories\Backend\TicketsRepository;
use Yajra\DataTables\Facades\DataTables;

class TicketsTableController extends Controller
{
    protected $repository;

    public function __construct(TicketsRepository $repository)  
    {
        $this->repository = $repository;  
    }

    public function __invoke(ManageTicketsRequest $request)
    {  
        return Datatables::of($this->repository->getForDataTable())
            ->escapeColumns(['content']) 
            ->addColumn('content', function ($tickets) {
                return $tickets->content; 
            })
            ->addColumn('type', function ($tickets) {
                return $tickets->type;
            }) 
            ->addColumn('expected', function ($tickets) {
                return $tickets->expected;
            })
            ->addColumn('status', function ($tickets) {
                return $tickets->status;
            })
            ->addColumn('link', function ($tickets) {
                return $tickets->link;
            })
            ->addColumn('response', function ($tickets) {
                return $tickets->response;
            })
            ->addColumn('user_id', function ($tickets) {
                return $tickets->user_name;
            })
            ->addColumn('created_at', function ($tickets) {
                return $tickets->created_at->toDateString();
            })         
            ->make(true);
    }
}
