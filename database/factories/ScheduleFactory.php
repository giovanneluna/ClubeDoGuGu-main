<?php

namespace Database\Factories;

use App\Models\Block;
use App\Models\Client;
use App\Models\ScheduleStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

class ScheduleFactory extends Factory
{
    public function definition()
    {
        return [
            'date' => $this->faker->date(),
            'time' => $this->faker->time(),
            'endTime' => $this->faker->time(),
            'total_price' => '20',
            'client_id' => Client::factory(),
            'paid_out' => true,
            'block_id' => Block::factory(),
            'schedule_status_id' => ScheduleStatus::first()->id,
        ];
    }
}