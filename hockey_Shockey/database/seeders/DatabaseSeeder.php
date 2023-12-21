<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Admin User',
        //     'email' => 'admin@gmail.com',
        //     'password' => password_hash('mypass', PASSWORD_DEFAULT),
        //     'role_id' => 1,
        // ]);

        $this->call(AdminUserSeeder::class);
        $this->call(categoriesTableSeeder::class);
        $this->call(ProductCategoryTypeSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(ProvincesTableSeeder::class);
        $this->call(TaxesTableSeeder::class);
    }
}
