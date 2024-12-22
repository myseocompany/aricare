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
            'email' => 'superadmin@saas.com',
            'password' => Hash::make('superadmin2025'),
        ]);
        $superAdmin->roles()->attach(1); // Rol super_admin

        // Crear Company Profiles (Empresas)
        $companies = CompanyProfile::factory()->count(3)->create();

        foreach ($companies as $company) {
            // Crear un Team para cada empresa
            $team = Team::create([
                'user_id' => $company->user_id,
                'name' => $company->company_name . ' Team',
                'personal_team' => false,
            ]);

            // Crear y asociar un administrador
            $admin = User::factory()->create();
            $admin->roles()->attach(2); // Rol company_admin
            $admin->teams()->attach($team->id, ['role_id' => 2, 'role' => 'company_admin']);

            // Crear doctores y asociarlos al team
            $doctors = User::factory()->count(5)->create();
            foreach ($doctors as $doctor) {
                $doctor->roles()->attach(4); // Rol doctor
                $doctor->teams()->attach($team->id, ['role_id' => 4, 'role' => 'doctor']);
            }

            // Crear pacientes y asociarlos al team
            $patients = User::factory()->count(20)->create();
            foreach ($patients as $patient) {
                $patient->roles()->attach(6); // Rol patient
                $patient->teams()->attach($team->id, ['role_id' => 6, 'role' => 'patient']);
            }

            // Crear asistentes y asociarlos al team
            $assistants = User::factory()->count(3)->create();
            foreach ($assistants as $assistant) {
                $assistant->roles()->attach(5); // Rol assistant
                $assistant->teams()->attach($team->id, ['role_id' => 5, 'role' => 'assistant']);
            }
        }
    }
}
