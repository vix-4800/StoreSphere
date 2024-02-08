<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(15)->create();

        \App\Models\User::create([
            'email' => 'test1@example.com',
            'password' => bcrypt('12345qwert'),
            'points' => 500,
        ]);
    }
}
