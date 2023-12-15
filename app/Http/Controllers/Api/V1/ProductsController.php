<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Backend\ProductsRepository;
use App\Http\Requests\Backend\Products\ManageProductsRequest;
use App\Http\Requests\Backend\Products\StoreProductsRequest;
use App\Http\Requests\Backend\Products\UpdateProductsRequest;
use App\Http\Requests\Backend\Products\DeleteProductsRequest;
use App\Http\Resources\ProductsResource;
use App\Models\Product;
use Illuminate\Http\Response;


class ProductsController extends APIController
{
    protected $repository;

    public function __construct(ProductsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(ManageProductsRequest $request)
    {
        $collection = $this->repository->retrieveList($request->all());

        return ProductsResource::collection($collection);
    }

    public function show(ManageProductsRequest $request, Product $product)
    {

        return new ProductsResource($product);
    }

    public function store(StoreProductsRequest $request)
    {
        return (new ProductsResource($this->repository->create($request->validated())))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);

    }

    public function update(UpdateProductsRequest $request, Product $product)
    {
       
        return new ProductsResource($this->repository->update($product, $request->validated()));
    }

    public function destroy(DeleteProductsRequest $request, Product $product)
    {
        $this->repository->delete($product);

        return response()->noContent();
    }
}
