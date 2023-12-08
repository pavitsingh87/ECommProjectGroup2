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
        
        User::create([
            'name' => 'Sample User1',
            'first_name' => 'John1',
            'last_name' => 'Doe1',
            'gender' => 'Male',
            'date_of_birth' => '1990-01-01',
            'email' => 'sample1@example.com',
            'password' => Hash::make('password1'), // Import Hash facade
            'contact_no' => '1234567890',
            'user_name' => 'sample_user1',
            'address_line_1' => '123 Main St',
            'address_line_2' => 'Apt 45',
            'city' => 'Sample City',
            'country' => 'Sample Country',
            'postal_code' => '12345',
            'role_id' => 0, // Assuming 1 is the ID for the default role
        ]);
    }
}
