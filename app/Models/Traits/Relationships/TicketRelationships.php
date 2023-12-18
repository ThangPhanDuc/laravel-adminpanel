<?php

namespace App\Models\Traits\Relationships;

use App\Models\Auth\User;
use App\Models\TicketFlag;

trait TicketRelationships
{
    public function user()  
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function flag()
    {
        return $this->belongsTo(TicketFlag::class, 'ticket_flag_id');
    }
}
