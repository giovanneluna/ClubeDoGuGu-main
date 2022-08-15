<?php

namespace Database\Factories;

use App\Models\Equipment;
use App\Models\EquipmentStock;
use Illuminate\Database\Eloquent\Factories\Factory;


class EquipmentStockFactory extends Factory
{

    public function definition()
    {
        return [
            'quantity' => 10,
            'equipments_id' => Equipment::factory(),
        ];
    }
}