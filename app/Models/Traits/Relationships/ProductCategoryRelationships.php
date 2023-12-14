<?php

namespace App\Models\Traits\Relationships;

use App\Models\Product;

trait ProductCategoryRelationships
{
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}
