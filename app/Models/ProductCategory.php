<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Traits\Attributes\ProductCategoryAttributes;
use App\Models\Traits\ModelAttributes;
use App\Models\Traits\Relationships\ProductCategoryRelationships;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductCategory extends BaseModel
{
    use ModelAttributes, ProductCategoryAttributes, ProductCategoryRelationships;
    protected $fillable = [
        'name',
        'code',
        'description',
    ];
    /**
     * Casts.
     *
     * @var array
     */
    protected $casts = [
        'status' => 'boolean',
    ];

    /**
     * Appends.
     *
     * @var array
     */
    protected $appends = [
        'display_status',
    ];
}
