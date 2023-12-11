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
        for ($categoryId = 1; $categoryId <= 4; $categoryId++) {
            Product::factory()->count(15)->create([
                'pct_id' => $categoryId,
            ]);
        }
    }
}
