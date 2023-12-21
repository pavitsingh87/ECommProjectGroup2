<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Newsletter;

class NewsletterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Add sample email addresses to the newsletters table
        Newsletter::create(['email' => 'sample1@example.com']);
        Newsletter::create(['email' => 'sample2@example.com']);
        
    }
}
