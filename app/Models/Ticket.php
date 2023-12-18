<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Traits\Attributes\TicketAttributes;
use App\Models\Traits\ModelAttributes;
use App\Models\Traits\Relationships\TicketRelationships;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Auth\User;

class Ticket extends Model
{
    use TicketAttributes, ModelAttributes, TicketRelationships;
    protected $fillable = [
        'content',
        'type',
        'expected',
        'user_id',
        'status',
        'link',
        'image_path',
        'response',
    ];
}
