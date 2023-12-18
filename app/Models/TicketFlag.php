<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Traits\Attributes\TicketFlagAttributes;
use App\Models\Traits\ModelAttributes;
use App\Models\Traits\Relationships\TicketFlagRelationships;
use Illuminate\Database\Eloquent\SoftDeletes;

class TicketFlag extends BaseModel
{
    use TicketFlagAttributes, ModelAttributes, TicketFlagRelationships;
    protected $fillable = ['name'];
}
