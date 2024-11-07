<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\CCMS\Models\Page;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::truncate();
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'prajwalbro@hotmail.com',
            'password' => bcrypt('password'),
            'is_admin' => true,
            'order' => 1,
        ]);

        Page::truncate();
        Page::create([
            'title' => 'Homepage',
            'slug' => '/',
            'type' => 'page',
            'status' => 1,
            'order' => 1,
        ]);
    }
}
