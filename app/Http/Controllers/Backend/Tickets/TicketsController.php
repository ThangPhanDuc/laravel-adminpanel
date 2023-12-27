<?php

namespace App\Http\Controllers\Backend\Tickets;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Backend\TicketsRepository;
use Illuminate\Support\Facades\View;
use App\Http\Responses\ViewResponse;
use App\Http\Requests\Backend\Tickets\ManageTicketsRequest;
use App\Http\Requests\Backend\Tickets\CreateTicketsRequest;
use App\Http\Requests\Backend\Tickets\UpdateTicketsRequest;
use App\Http\Requests\Backend\Tickets\DeleteTicketsRequest;
use App\Http\Requests\Backend\Tickets\EditTicketsRequest;
use App\Http\Requests\Backend\Tickets\StoreTicketsRequest;
use App\Models\Ticket;
use App\Models\TicketFlag;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\Backend\Tickets\EditResponse;


class TicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $repository;
    public function __construct(TicketsRepository $repository)
    {
        $this->repository = $repository;
        View::share('js', ['blogs']);
    }
    public function index(ManageTicketsRequest $request)
    {
        return new ViewResponse('backend.tickets.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CreateTicketsRequest $request)
    {
        $ticketFlags = TicketFlag::getSelectData();

        return new ViewResponse('backend.tickets.create', ['ticketFlags' => $ticketFlags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTicketsRequest $request)
    {

        $this->repository->create($request->except(['_token', '_method']));
        return new RedirectResponse(route('admin.tickets.index'), ['flash_success' => __('alerts.backend.tickets.created')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ManageTicketsRequest $request, Ticket $ticket)
    {
    
        return new ViewResponse('backend.tickets.show', ['ticket' => $ticket]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket, StoreTicketsRequest $request)
    {
        $ticketFlags = TicketFlag::getSelectData();

        return new EditResponse($ticket, $ticketFlags);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Ticket $ticket, UpdateTicketsRequest $request)
    {
        $this->repository->update($ticket, $request->except(['_token', '_method']));

        return new RedirectResponse(route('admin.tickets.index'), ['flash_success' => __('alerts.backend.tickets.updated')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket, DeleteTicketsRequest $request)
    {
        $this->repository->delete($ticket);

        return new RedirectResponse(route('admin.tickets.index'), ['flash_success' => __('alerts.backend.tickets.deleted')]);
    }
}
