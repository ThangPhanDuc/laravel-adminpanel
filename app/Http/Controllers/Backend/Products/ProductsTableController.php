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

        $query = $this->repository->getForDataTable();


        if ($request->filled('from_date') && $request->filled('to_date')) {
            $query->whereBetween('created_at', [$request->from_date . ' 00:00:00', $request->to_date . ' 23:59:59']);
        }

        return Datatables::of($query)
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
                return $products->created_at->format('Y-m-d');
            })
            ->addColumn('actions', function ($products) {
                return $products->action_buttons;
            })
            ->make(true);


    }
}
