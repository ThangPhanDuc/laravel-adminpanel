<?php

namespace App\Http\Controllers\Backend\Products;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Backend\ProductsRepository;
use Illuminate\Support\Facades\View;
use App\Http\Responses\ViewResponse;
use App\Http\Requests\Backend\Products\ManageProductsRequest;
use App\Http\Requests\Backend\Products\CreateProductsRequest;
use App\Http\Requests\Backend\Products\StoreProductsRequest;
use App\Http\Requests\Backend\Products\EditProductsRequest;
use App\Http\Requests\Backend\Products\DeleteProductsRequest;
use App\Http\Requests\Backend\Products\UpdateProductsRequest;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\Backend\Products\EditResponse;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $repository;
    public function __construct(ProductsRepository $repository)
    {
        $this->repository = $repository;
        View::share('js', ['products']);
    }
    public function index(ManageProductsRequest $request)
    {
        return new ViewResponse('backend.products.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CreateProductsRequest $request, Product $product)
    {
        $productCategories = ProductCategory::getSelectData();

        return new ViewResponse('backend.products.create', ['productCategories' => $productCategories]);
    }

    /** 
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductsRequest $request)
    {

        $this->repository->create($request->except(['_token', '_method']));

        return new RedirectResponse(route('admin.products.index'), ['flash_success' => __('alerts.backend.products.created')]);
    }
    public function show(ManageProductsRequest $request, Product $product)
    {
      
        $product1 =  $this->repository->show($product);

        return new ViewResponse('backend.products.show', ['product' => $product]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product, EditProductsRequest $request)
    {
        $productCategories = ProductCategory::getSelectData();

        return new EditResponse($product, $productCategories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Product $product, UpdateProductsRequest $request)
    {

        $this->repository->update($product, $request->except(['_token', '_method']));

        return new RedirectResponse(route('admin.products.index'), ['flash_success' => __('alerts.backend.products.updated')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, DeleteProductsRequest $request)
    {
        $this->repository->delete($product);

        return new RedirectResponse(route('admin.products.index'), ['flash_success' => __('alerts.backend.products.deleted')]);
    }
}
