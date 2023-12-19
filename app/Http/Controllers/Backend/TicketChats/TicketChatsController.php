<?php

namespace App\Http\Controllers\Backend\TicketChats;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Backend\TicketChatsRepository;
use App\Http\Requests\Backend\TicketChats\ManageTicketChatsRequest;
use App\Models\Ticket;

class TicketChatsController extends Controller
{
    protected $repository;

    public function __construct(TicketChatsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(ManageTicketChatsRequest $request, Ticket $ticket)
    {
        $collection = $this->repository->getChatsByTicket($ticket);
        return $collection;
    }

    public function store(ManageTicketChatsRequest $request, Ticket $ticket)
    {
        $chat = $this->repository->create($request, $ticket);
        
        return response()->json(['message' => 'Message sent successfully', 'chat' => $chat]);
    }
}
