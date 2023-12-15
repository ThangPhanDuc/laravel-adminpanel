<?php

namespace App\Repositories\Backend;

use App\Events\Backend\Products\ProductCreated;
use App\Events\Backend\Products\ProductDeleted;
use App\Events\Backend\Products\ProductUpdated;
use App\Exceptions\GeneralException;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Repositories\BaseRepository;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductsRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Product::class;

    protected $upload_path;

    /**
     * Sortable.
     *
     * @var array
     */
    private $sortable = [
        'id',
        'name',
        'code',
        'unit_price',
        'discount',
        'final_price',
        'category_id',
        'image',
        'description',
    ];

    /**
     * Storage Class Object.
     *
     * @var \Illuminate\Support\Facades\Storage
     */
    protected $storage;

    public function __construct()
    {
        $this->upload_path = 'img' . DIRECTORY_SEPARATOR . 'product' . DIRECTORY_SEPARATOR;
        $this->storage = Storage::disk('public');
    }

    /**
     * Retrieve List.
     *
     * @var array
     * @return Collection
     */
    public function retrieveList(array $options = [])
    {
        $perPage = isset($options['per_page']) ? (int) $options['per_page'] : 20;
        $orderBy = isset($options['order_by']) && in_array($options['order_by'], $this->sortable) ? $options['order_by'] : 'created_at';
        $order = isset($options['order']) && in_array($options['order'], ['asc', 'desc']) ? $options['order'] : 'desc';
        $query = $this->query()
            ->with([
                'category',
            ])
            ->orderBy($orderBy, $order);

        if ($perPage == -1) {
            return $query->get();
        }

        return $query->paginate($perPage);
    }

    /**
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->query()
            ->leftjoin('product_categories', 'product_categories.id', '=', 'products.category_id')
            ->select([
                'products.id',
                'products.name',
                'products.code',
                'products.unit_price',
                'products.discount',
                'products.final_price',
                'products.created_at',
                'product_categories.name as category_name',
            ]);
    }

    public function show(Product $product)
    {
        try {
            return $this->query()
                ->with('category')
                ->findOrFail($product->id);
        } catch (\Exception $e) {
            throw new GeneralException(__('exceptions.backend.products.show_error'), $e->getCode(), $e);
        }
    }

    /**
     * @param array $input
     *
     * @throws \App\Exceptions\GeneralException
     *
     * @return bool
     */
    public function create(array $input)
    {
        try {
            return DB::transaction(function () use ($input) {
                $input['name'] = $input['name'];
                $input['code'] = $input['code'];
                $input['unit_price'] = floatval($input['unit_price']);
                $input['discount'] = floatval($input['discount']);
                $input['final_price'] = floatval($input['final_price']);
                $input['category_id'] = $input['category_id'];
                $input['description'] = $input['description'];
                $input = $this->uploadImage($input);

                if ($product = Product::create($input)) {
                    event(new ProductCreated($product));

                    return $product;
                }

                throw new GeneralException(__('exceptions.backend.products.create_error'));
            });
        } catch (\Exception $e) {
            throw new GeneralException(__('exceptions.backend.products.create_error'), $e->getCode(), $e);
        }
    }

    /**
     * @param \App\Models\Product $product
     * @param array $input
     */
    public function update(Product $product, array $input)
    {
        try {
            // Uploading Image
            if (array_key_exists('image', $input)) {
                $this->deleteOldFile($product);
                $input = $this->uploadImage($input);
            }

            return DB::transaction(function () use ($product, $input) {
                if ($product->update($input)) {

                    event(new ProductUpdated($product));

                    return $product->fresh();
                }

                throw new GeneralException(__('exceptions.backend.products.update_error'));
            });
        } catch (\Exception $e) {
            throw new GeneralException(__('exceptions.backend.products.update_error'), $e->getCode(), $e);
        }
    }

    /**
     * @param \App\Models\Product $product
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function delete(Product $product)
    {
        try {
            DB::transaction(function () use ($product) {
                if ($product->delete()) {
                    // Deleting Image
                    $this->deleteOldFile($product);

                    event(new ProductDeleted($product));

                    return true;
                }

                throw new GeneralException(__('exceptions.backend.products.delete_error'));
            });
        } catch (\Exception $e) {
            throw new GeneralException(__('exceptions.backend.products.delete_error'), $e->getCode(), $e);
        }
    }

    /**
     * Upload Image.
     *
     * @param array $input
     *
     * @return array $input
     */
    public function uploadImage($input)
    {
        if (isset($input['image']) && !empty($input['image'])) {
            $product_image = $input['image'];
            $fileName = time() . $product_image->getClientOriginalName();

            $this->storage->put($this->upload_path . $fileName, file_get_contents($product_image->getRealPath()));

            $input = array_merge($input, ['image' => $fileName]);
        }

        return $input;
    }

    /**
     * Destroy Old Image.
     *
     * @param int $id
     */
    public function deleteOldFile($model)
    {
        $fileName = $model->image;

        return $this->storage->delete($this->upload_path . $fileName);
    }
}
