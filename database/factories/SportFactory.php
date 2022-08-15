<?php

namespace Database\Factories;

use App\Models\Equipment;
use Illuminate\Database\Eloquent\Factories\Factory;

class SportFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'equipments_id' => Equipment::factory(),
        ];
    }
}
