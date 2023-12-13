<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tax;
use App\Models\Province;

class TaxesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $taxesData = [
            ['province_id' => 1, 'gst_rate' => 5.0, 'pst_rate' => 0.0],
            ['province_id' => 2, 'gst_rate' => 5.0, 'pst_rate' => 7.0],
            ['province_id' => 3, 'gst_rate' => 5.0, 'pst_rate' => 7.0],
            ['province_id' => 4, 'gst_rate' => 15.0, 'pst_rate' => 0.0],
            ['province_id' => 5, 'gst_rate' => 15.0, 'pst_rate' => 0.0],
            ['province_id' => 6, 'gst_rate' => 5.0, 'pst_rate' => 10.0],
            ['province_id' => 7, 'gst_rate' => 15.0, 'pst_rate' => 8.0],
            ['province_id' => 8, 'gst_rate' => 15.0, 'pst_rate' => 10.0],
            ['province_id' => 9, 'gst_rate' => 5.0, 'pst_rate' => 9.975],
            ['province_id' => 10, 'gst_rate' => 5.0, 'pst_rate' => 6.0]
        ];

        foreach ($taxesData as $taxData) {
            Tax::create($taxData);
        }
    }
}

