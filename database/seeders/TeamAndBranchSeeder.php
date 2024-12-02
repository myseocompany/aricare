<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\Branch;
use Illuminate\Database\Seeder;

class TeamAndBranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear 5 clínicas (teams)
        Team::factory()
            ->count(5)
            ->create()
            ->each(function ($team) {
                // Crear 2-3 sedes (branches) por clínica
                Branch::factory()
                    ->count(rand(2, 3))
                    ->create(['team_id' => $team->id]);
            });
    }
}
