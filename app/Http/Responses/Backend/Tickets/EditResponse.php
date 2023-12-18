<?php

namespace App\Http\Responses\Backend\Tickets;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    protected $ticket;

    protected $ticketFlags;

    public function __construct($ticket, $ticketFlags)
    {
        $this->ticket = $ticket;
        $this->ticketFlags = $ticketFlags;
    }

    public function toResponse($request)
    {
        return view('backend.tickets.edit')->with([
            'ticket' => $this->ticket,
            'ticketFlags' => $this->ticketFlags,
        ]);
    }
}
