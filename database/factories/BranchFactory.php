<?php

namespace Database\Factories;

use App\Models\Branch;
use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;

class BranchFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'team_id' => Team::inRandomOrder()->first()->id, // Relación con un equipo
            'name' => $this->faker->city . ' Sede',
            'address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
