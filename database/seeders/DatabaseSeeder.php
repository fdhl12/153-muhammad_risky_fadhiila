<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Content;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // Membuat user dengan role 'user'
        Content::factory()->category()->user()->create();

        // // Membuat user dengan role 'admin'
        // User::factory()->admin()->create();
    }
}
