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
        $seeders = [
            UserSeeder::class,
            ItemSeeder::class,
        ];

        foreach ($seeders as $seeder) {
            $this->call($seeder);
        }
    }
}
