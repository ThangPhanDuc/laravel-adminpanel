<?php

namespace App\Models\Traits\Relationships;

use App\Models\Auth\User;

trait LeaveRelationships
{
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
