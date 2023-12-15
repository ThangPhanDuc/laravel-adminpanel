<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Traits\Attributes\ProductAttributes;
use App\Models\Traits\ModelAttributes;
use App\Models\Traits\Relationships\ProductRelationships;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends BaseModel
{
    use ModelAttributes, ProductAttributes, ProductRelationships;
    protected $fillable = [
        'name',
        'code',
        'unit_price',
        'discount',
        'final_price',
        'category_id',
        'image',
        'description',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
