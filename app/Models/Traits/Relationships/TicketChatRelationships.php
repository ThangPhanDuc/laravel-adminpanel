<?php

namespace App\Models\Traits\Relationships;

use App\Models\Auth\User;
use App\Models\Ticket;

trait TicketChatRelationships
{
    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
