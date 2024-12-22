<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\CompanyProfile;
use Illuminate\Database\Seeder;

class CompanyProfileSeeder extends Seeder
{
    public function run(): void
    {
        // Obtener todos los usuarios con el rol de administrador desde la tabla intermedia
        $adminUsers = User::whereHas('roles', function ($query) {
            $query->where('role_id', 2); // ID del rol 'admin'
        })->get();

        foreach ($adminUsers as $admin) {
            // Crear un perfil de empresa para cada administrador
            CompanyProfile::factory()->create([
                'user_id' => $admin->id,
                'company_name' => 'Empresa de ' . $admin->name,
            ]);
        }
    }
}
