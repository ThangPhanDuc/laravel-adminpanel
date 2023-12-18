<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Traits\Attributes\TicketAttributes;
use App\Models\Traits\ModelAttributes;
use App\Models\Traits\Relationships\TicketRelationships;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Auth\User;

class Ticket extends BaseModel
{
    use TicketAttributes, ModelAttributes, TicketRelationships;
    protected $fillable = [
        'content',
        'type',
        'ticket_flag_id',
        'expected',
        'user_id',
        'status',
        'link',
        'image_path',
        'response',
        'created_by',
        'updated_by',
    ];
}
