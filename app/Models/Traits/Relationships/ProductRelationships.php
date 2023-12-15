<?php

namespace App\Models\Traits\Relationships;

use App\Models\Auth\User;
use App\Models\ProductCategory;


trait ProductRelationships
{
    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }
}
