<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 50; $i++) {
            DB::table('products')->insert([
                'product_name' => "Product $i",
                'product_description' => "Description for Product $i",
                'product_image' => "image_$i.jpg",
                'product_size' => "Size $i",
                'price' => 10.99 * $i, 
                'availability_status' => 'available',
                'pct_id' => $i,
                'i_id' => $i,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
