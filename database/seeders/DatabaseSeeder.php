<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(25)->create();
        \App\Models\Item::factory(75)->create();

        \App\Models\User::create([
            'email' => 'test1@example.com',
            'password' => bcrypt('12345qwert'),
            'points' => 500,
        ]);

        \App\Models\User::create([
            'email' => 'test2@example.com',
            'password' => bcrypt('12345qwert'),
            'points' => 1200,
        ]);
    }
}
