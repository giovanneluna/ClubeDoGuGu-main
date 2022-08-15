<?php

namespace Database\Factories;

use App\Models\Sport;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlockFactory extends Factory
{
    public function definition()
    {
        return [
            'block_type' => $this->faker->state(),
            'sport_id' => Sport::factory(),
            'public_amount' => '200',
            'is_available' => true,
            'local' => $this->faker->streetName(),
            'amount' => '20',
        ];
    }
}
