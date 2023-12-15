<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        // Create 15 products for each category
        // for ($categoryId = 1; $categoryId <= 4; $categoryId++) {
            // Product::factory()->count(15)->create([
            //     'product_category_type_id' => $categoryId,
            // ]);
             Product::create([
            'product_name' => 'John',
            'product_description' => 'Doe',
            'product_image' => 'Male',
            'product_size' => '1990-01-01',
            'price' => 'admin@gmail.com',
            'availability_status' => 'available',
            'product_category_type_id' => '1',
            
        ]);
        // }
    }
}
