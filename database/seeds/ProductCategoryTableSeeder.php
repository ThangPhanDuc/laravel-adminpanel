<?php

use Illuminate\Database\Seeder;
use App\Models\ProductCategory;

class ProductCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        ProductCategory::create(['name' => 'Phones', 'code' => 'PHN', 'description' => 'Smartphones and mobile devices']);
        ProductCategory::create(['name' => 'Laptops', 'code' => 'LAP', 'description' => 'Laptops and notebooks']);
        ProductCategory::create(['name' => 'Tablets', 'code' => 'TAB', 'description' => 'Tablet computers']);
    }
}
