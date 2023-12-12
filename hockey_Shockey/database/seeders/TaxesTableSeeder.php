<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tax;

class TaxesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $provinces = \App\Models\Province::pluck('id')->toArray();

            foreach ($provinces as $provinceId) {
                Tax::create([
                    'province_id' => $provinceId,
                ]);
            }
        }
    }

