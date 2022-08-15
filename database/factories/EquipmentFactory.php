<?php

namespace Database\Factories;

use App\Models\EquipmentType;
use Illuminate\Database\Eloquent\Factories\Factory;

class EquipmentFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->lastName(),
            'description' => 'Teste',
            'equipment_type_id' => EquipmentType::factory(),
        ];
    }
}