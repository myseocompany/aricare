<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Team;
use App\Models\CompanyProfile;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Crear superadmin (Casa de software)
        $superAdmin = User::create([
            'name' => 'Super Admin',
            'email' => 'soporterapido@myseocompany.co',
            'password' => Hash::make('myseo2025'),
            'email_verified_at' => now(), // Marcamos el correo como verificado
        ]);

        // Crear un equipo global para el SuperAdmin
        $globalTeam = Team::create([
            'user_id' => $superAdmin->id, // Relación del equipo con el super admin
            'name' => 'Global Team',
            'personal_team' => false,
        ]);

        // Asociar el SuperAdmin al equipo global
        $superAdmin->teams()->attach($globalTeam->id, ['role_id' => 1, 'role' => 'super_admin']);

        // Crear Company Profiles (Empresas)
        $companies = CompanyProfile::factory()->count(3)->create();

        foreach ($companies as $company) {
            // Crear un Team para cada empresa
            $team = Team::create([
                'user_id' => $company->user_id ?? $superAdmin->id, // Si no hay un usuario específico, usar el SuperAdmin
                'name' => $company->company_name . ' Team',
                'personal_team' => false,
            ]);

            // Crear y asociar un administrador
            $admin = User::factory()->create([
                'name' => $company->company_name . ' Admin',
                'email' => 'admin_' . $company->id . '@myseocompany.co',
                'password' => Hash::make('myseo2025'),
                'email_verified_at' => now(),
            ]);
            $admin->teams()->attach($team->id, ['role_id' => 2, 'role' => 'company_admin']);

            // Crear doctores y asociarlos al team
            $doctors = User::factory()->count(5)->create();
            foreach ($doctors as $doctor) {
                $doctor->teams()->attach($team->id, ['role_id' => 4, 'role' => 'doctor']);
            }

            // Crear pacientes y asociarlos al team
            $patients = User::factory()->count(20)->create();
            foreach ($patients as $patient) {
                $patient->teams()->attach($team->id, ['role_id' => 6, 'role' => 'patient']);
            }

            // Crear asistentes y asociarlos al team
            $assistants = User::factory()->count(3)->create();
            foreach ($assistants as $assistant) {
                $assistant->teams()->attach($team->id, ['role_id' => 5, 'role' => 'assistant']);
            }

            // Crear el asistente Nicolás si no existe
            $nicolas = User::firstOrCreate(
                ['email' => 'nicolas@myseocompany.co'], // Condición para buscar
                [ // Valores para insertar si no existe
                    'name' => 'Nicolás',
                    'password' => Hash::make('myseo2025'),
                    'email_verified_at' => now(),
                ]
            );

            // Asociar Nicolás al equipo si no está asociado
            if (!$nicolas->teams()->where('team_id', $team->id)->exists()) {
                $nicolas->teams()->attach($team->id, ['role_id' => 5, 'role' => 'assistant']);
}
    
        
        }
    }
}
