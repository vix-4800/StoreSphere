<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'Шоссейный велосипед BMC Roadmachine 01 Five Ultegra Di2 (2023)',
            'price' => random_int(15000, 999999),
            'image_path' => 'images/item.webp',
            'has_discount' => random_int(0, 1),
        ];
    }
}
