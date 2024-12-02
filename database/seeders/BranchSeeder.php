<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teams = Team::all();

        foreach ($teams as $team) {
            $team->branches()->createMany([
                [
                    'name' => 'Sede Principal - ' . $team->name,
                    'address' => $this->faker->address(),
                    'phone' => $this->faker->phoneNumber(),
                    'email' => 'contacto@sede-' . $team->id . '.com',
                ],
                [
                    'name' => 'Sede Secundaria - ' . $team->name,
                    'address' => $this->faker->address(),
                    'phone' => $this->faker->phoneNumber(),
                    'email' => 'contacto2@sede-' . $team->id . '.com',
                ],
            ]);
        }
    }
}
