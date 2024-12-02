<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->withPersonalTeam()->create([
            'name' => 'Test User',
            'email' => 'soporterapido@myseocompany.co',
            'password' => Hash::make('myseo2025'),
            'is_super_admin' => true, // Super Admin
            'document_type_id' => 1, // Ejemplo: Cédula de Ciudadanía
            'document_id' => '75078986',
            
            
        ]);
        // Crear un administrador específico
        User::create([
            'name' => 'Admin Clinica',
            'email' => 'admin@clinica.com',
            'password' => Hash::make('password'),
            'is_super_admin' => false, // Super Admin
            'document_type_id' => 1, // Ejemplo: Cédula de Ciudadanía
            'document_id' => '999999999',
            
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Crear doctores
        User::factory()->count(5)->create();

        // Crear pacientes
        User::factory()->count(20)->create();
    }
}
