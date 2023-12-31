<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash; // Add this line
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        // User with role_id = 1
        User::create([
            'name' => 'Sample User',
            'first_name' => 'John',
            'last_name' => 'Doe',
            'gender' => 'Male',
            'date_of_birth' => '1990-01-01',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('mypass'),
            'contact_no' => '1234567890',
            'user_name' => 'admin_user',
            'address_line_1' => '123 Main St',
            'address_line_2' => 'Apt 45',
            'city' => 'Sample City',
            'country' => 'Sample Country',
            'postal_code' => '12345',
            'role_id' => 1, // Assuming 1 is the ID for the default role
        ]);

        // User with role_id = 0
        User::create([
            'name' => 'Sample User',
            'first_name' => 'John',
            'last_name' => 'Doe',
            'gender' => 'Male',
            'date_of_birth' => '1990-01-01',
            'email' => 'sample@example.com',
            'password' => Hash::make('password'),
            'contact_no' => '1234567890',
            'user_name' => 'sample_user',
            'address_line_1' => '123 Main St',
            'address_line_2' => 'Apt 45',
            'city' => 'Sample City',
            'country' => 'Sample Country',
            'postal_code' => '12345',
            'role_id' => 0, 
        ]);
    }
}
