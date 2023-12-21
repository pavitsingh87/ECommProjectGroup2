<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductCategoryTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Men', 'Women', 'Kids', 'Accessories'];

        foreach ($categories as $category) {
            DB::table('product_category_type')->insert([
                'pct_name' => $category,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
