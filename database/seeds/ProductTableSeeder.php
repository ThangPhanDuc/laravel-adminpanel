<?php

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Product::truncate();

        // Create smartphones
        Product::create([
            'name' => 'Smartphone X',
            'code' => 'SPX001',
            'unit_price' => 799.99,
            'discount' => 10.00,
            'final_price' => 719.99,
            'category_id' => 1,
            'image' => 'https://cdn.tgdd.vn/Products/Images/42/305658/iphone-15-pro-max-blue-thumbnew-600x600.jpg',
            'description' => 'A high-end smartphone with advanced features.',
        ]);

        Product::create([
            'name' => 'Smartphone Y',
            'code' => 'SPY002',
            'unit_price' => 699.99,
            'discount' => 15.00,
            'final_price' => 594.99,
            'category_id' => 1,
            'image' => 'https://cdn.tgdd.vn/Products/Images/42/303891/iphone-15-plus-hong-128gb-thumb-600x600.jpg',
            'description' => 'Description for Smartphone Y.',
        ]);

        Product::create([
            'name' => 'Smartphone Z',
            'code' => 'SPZ003',
            'unit_price' => 899.99,
            'discount' => 5.00,
            'final_price' => 854.99,
            'category_id' => 1,
            'image' => 'https://cdn.tgdd.vn/Products/Images/42/317530/samsung-galaxy-a05s-sliver-thumb-600x600.jpeg',
            'description' => 'Description for Smartphone Z.',
        ]);

        // Create laptops
        Product::create([
            'name' => 'Laptop Pro',
            'code' => 'LTP002',
            'unit_price' => 1499.99,
            'discount' => 0.00,
            'final_price' => 1499.99,
            'category_id' => 2,
            'image' => 'https://cdn.tgdd.vn/Products/Images/44/304867/asus-tuf-gaming-f15-fx506hf-i5-hn014w-thumb-600x600.jpg',
            'description' => 'Powerful laptop for professional use.',
        ]);

        Product::create([
            'name' => 'Laptop Air',
            'code' => 'LTA003',
            'unit_price' => 1299.99,
            'discount' => 8.00,
            'final_price' => 1195.99,
            'category_id' => 2,
            'image' => 'https://cdn.tgdd.vn/Products/Images/44/313667/lenovo-ideapad-gaming-3-15ach6-r5-82k2027pvn-600x600.png',
            'description' => 'Description for Laptop Air.',
        ]);

        Product::create([
            'name' => 'Laptop Ultra',
            'code' => 'LTU004',
            'unit_price' => 1699.99,
            'discount' => 12.00,
            'final_price' => 1495.99,
            'category_id' => 2,
            'image' => 'https://cdn.tgdd.vn/Products/Images/44/313611/lenovo-loq-gaming-15irh8-i5-82xv00q4vn-thumb-600x600.jpg',
            'description' => 'Description for Laptop Ultra.',
        ]);

        // Create tablets
        Product::create([
            'name' => 'Tablet A',
            'code' => 'TAB003',
            'unit_price' => 349.99,
            'discount' => 20.00,
            'final_price' => 279.99,
            'category_id' => 3,
            'image' => 'https://cdn.tgdd.vn/Products/Images/522/318353/honor-pad-x9-thumb-1-600x600.jpg',
            'description' => 'Compact tablet with a sleek design.',
        ]);

        Product::create([
            'name' => 'Tablet B',
            'code' => 'TBB004',
            'unit_price' => 299.99,
            'discount' => 15.00,
            'final_price' => 254.99,
            'category_id' => 3,
            'image' => 'https://cdn.tgdd.vn/Products/Images/522/247517/iPad-9-wifi-trang-600x600.jpg',
            'description' => 'Description for Tablet B.',
        ]);

        Product::create([
            'name' => 'Tablet C',
            'code' => 'TBC005',
            'unit_price' => 399.99,
            'discount' => 10.00,
            'final_price' => 359.99,
            'category_id' => 3,
            'image' => 'https://cdn.tgdd.vn/Products/Images/522/285039/lenovo-tab-m10-gen-3-1-2-600x600.jpg',
            'description' => 'Description for Tablet C.',
        ]);
    }
}
