<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Province;

class ProvincesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $provinces = [
            ['name' => 'Alberta', 'gst_rate' => 5.0, 'pst_rate' => 0.0],
            ['name' => 'British Columbia', 'gst_rate' => 5.0, 'pst_rate' => 7.0],
            ['name' => 'Manitoba', 'gst_rate' => 5.0, 'pst_rate' => 8.0],
            ['name' => 'New Brunswick', 'gst_rate' => 15.0, 'pst_rate' => 10.0],
            ['name' => 'Newfoundland and Labrador', 'gst_rate' => 15.0, 'pst_rate' => 10.0],
            ['name' => 'Nova Scotia', 'gst_rate' => 15.0, 'pst_rate' => 10.0],
            ['name' => 'Ontario', 'gst_rate' => 5.0, 'pst_rate' => 8.0],
            ['name' => 'Prince Edward Island', 'gst_rate' => 15.0, 'pst_rate' => 10.0],
            ['name' => 'Quebec', 'gst_rate' => 5.0, 'pst_rate' => 9.975],
            ['name' => 'Saskatchewan', 'gst_rate' => 5.0, 'pst_rate' => 6.0]
        ];

        foreach ($provinces as $provinceData) {
            Province::create($provinceData);
        }
    }
}

