<?php

namespace App\Http\Controllers\Backend\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\Products\ManageProductsRequest;
use App\Repositories\Backend\ProductsRepository;
use Yajra\DataTables\Facades\DataTables;

class ProductsTableController extends Controller
{
    protected $repository;
    public function __construct(ProductsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(ManageProductsRequest $request)
    {
        return Datatables::of($this->repository->getForDataTable())
            ->escapeColumns(['name'])
            ->addColumn('name', function ($products) {
                return $products->name;
            })
            ->addColumn('code', function ($products) {
                return $products->code;
            })
            ->addColumn('unit_price', function ($products) {
                return $products->unit_price;
            })
            ->addColumn('discount', function ($products) {
                return $products->discount;
            })
            ->addColumn('final_price', function ($products) {
                return $products->final_price;
            })
            ->addColumn('category', function ($products) {
                return $products->category_id;
            })
            ->addColumn('created_at', function ($products) {
                return $products->created_at->toDateString();
            })
            ->addColumn('actions', function ($products) {
                return $products->action_buttons;
            })
            ->make(true);
    }
}
