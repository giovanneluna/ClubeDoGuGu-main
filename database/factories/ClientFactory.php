<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    protected $model = Client::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'cpf' => $this->faker->unique()->cpf(),
            'email' => $this->faker->unique()->safeEmail(),
            'telephone' => $this->faker->e164PhoneNumber(),
            'age' => $this->faker->numberBetween(15, 90),
            'address' => $this->faker->address(),
        ];
    }
}
