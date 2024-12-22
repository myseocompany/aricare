<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        Role::insert([
            ['id' => 1, 'name' => 'super_admin', 'description' => 'Administra el sistema SaaS, tiene control total.', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'name' => 'company_admin', 'description' => 'Administra una empresa que alquila el SaaS.', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'name' => 'branch_admin', 'description' => 'Administra una sucursal específica de la empresa.', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'name' => 'doctor', 'description' => 'Doctor que pertenece a una sucursal.', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'name' => 'assistant', 'description' => 'Asistente que pertenece a una sucursal.', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 6, 'name' => 'patient', 'description' => 'Paciente registrado en una sucursal.', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
