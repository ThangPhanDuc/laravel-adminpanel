<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\Resource;

class ProductsResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'code' => $this->code,
            'unit_price' => $this->unit_price,
            'discount' => $this->discount,
            'final_price' => $this->final_price,
            'category_id' => $this->category_id,
            'category' => new ProductCategoriesResource($this->category), 
            'image' => $this->image,
            'description' => $this->description,
            'created_at' => optional($this->created_at)->toDateString(),
            'updated_at' => optional($this->updated_at)->toDateTimeString(),
        ];
    }
}
