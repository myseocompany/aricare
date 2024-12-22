<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\Branch;
use App\Models\CompanyProfile;
use Illuminate\Database\Seeder;

class TeamAndBranchSeeder extends Seeder
{
    public function run(): void
    {
        $companyProfiles = CompanyProfile::all();

        foreach ($companyProfiles as $profile) {
            // Crear un equipo para cada perfil de empresa
            $team = Team::create([
                'name' => $profile->company_name . ' Team',
                'user_id' => $profile->user_id, // Usuario propietario del equipo
                'personal_team' => false,
            ]);

            // Crear sucursales asociadas al equipo
            $branchCount = rand(1, 3);
            for ($i = 1; $i <= $branchCount; $i++) {
                Branch::create([
                    'team_id' => $team->id,
                    'name' => $profile->company_name . ' Sucursal ' . $i,
                    'address' => 'Calle ' . rand(1, 100) . ' # ' . rand(1, 100),
                    'phone' => '300' . rand(1000000, 9999999),
                    'email' => 'sucursal' . $i . '@' . strtolower(str_replace(' ', '', $profile->company_name)) . '.com',
                ]);
            }
        }
    }
}
