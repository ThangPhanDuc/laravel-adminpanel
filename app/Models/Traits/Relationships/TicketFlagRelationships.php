<?php

namespace App\Models\Traits\Relationships;

use App\Models\Ticket;
trait TicketFlagRelationships
{
    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'ticket_flag_id');
    }
}
