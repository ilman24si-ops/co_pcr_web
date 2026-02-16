<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class KunjunganFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nama' => fake()->name(),
            'email' => fake()->safeEmail(),
            'institusi' => fake()->company(),
        ];
    }
}
