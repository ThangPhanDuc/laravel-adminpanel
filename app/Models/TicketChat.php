<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Relationships\TicketChatRelationships;

class TicketChat extends Model
{
    use TicketChatRelationships;
    protected $fillable = [
        'ticket_id', 'user_id', 'content',
    ];
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
