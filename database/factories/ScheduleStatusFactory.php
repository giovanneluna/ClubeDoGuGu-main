<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class ScheduleStatusFactory extends Factory
{
    public function definition()
    {
        return [
            'status' => 'Agendado',
        ];
    }
}