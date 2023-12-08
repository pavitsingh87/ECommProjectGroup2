<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
<<<<<<< HEAD
            'last_name' => 'Admin User',
            'first_name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('mypass'),
        ]);
        $this->call(ProductsTableSeeder::class);
=======
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => password_hash('mypass', PASSWORD_DEFAULT),
            'role_id' => 1,
        ]);


        $this->call(SeedCake::class);
>>>>>>> ceed76b868556682948928829373e454ebeb610c
    }
}
