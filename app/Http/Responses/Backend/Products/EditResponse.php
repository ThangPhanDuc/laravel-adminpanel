<?php

namespace App\Http\Responses\Backend\Products;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    protected $product;

    protected $productCategories;

    public function __construct($product, $productCategories)
    {
        $this->product = $product;
        $this->productCategories = $productCategories;
    }

    public function toResponse($request)
    {

        return view('backend.products.edit')->with([
            'product' => $this->product,
            'productCategories' => $this->productCategories,
        ]);
    }
}
