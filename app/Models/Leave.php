<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Attributes\LeaveAttributes;
use App\Models\Traits\ModelAttributes;
use App\Models\Traits\Relationships\LeaveRelationships;


use App\Models\Auth\User;

class Leave extends BaseModel
{
    use ModelAttributes, LeaveAttributes, LeaveRelationships;
    protected $fillable = [
        'user_id',
        'leave_type',
        'start_date',
        'end_date',
        'reason',
        'status',
        'manager_confirmation',
        'hr_confirmation',
        'create_at'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    protected $dates = ['start_date', 'end_date'];
}
