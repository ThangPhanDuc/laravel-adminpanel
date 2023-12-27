<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Traits\Attributes\EmployeeAttributes;
use App\Models\Traits\ModelAttributes;
use App\Models\Traits\Relationships\EmployeeRelationships;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends BaseModel
{
    use ModelAttributes, SoftDeletes, EmployeeAttributes, EmployeeRelationships;
    protected $fillable = [
        'full_name',
        'phone_number',
        'position',
        'salary',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at', 
    ];
}
