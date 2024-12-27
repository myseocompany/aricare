<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CountryStateCitySeeder::class,
            DocumentTypeSeeder::class,
            CompanyTypesSeeder::class,
            RoleSeeder::class,
            EmployeeRangeSeeder::class,
            ResourceTypeSeeder::class,
            AppointmentTypeSeeder::class,
            UserSeeder::class,             // Crear usuarios (incluidos administradores)
            CompanyProfileSeeder::class,  // Asociar administradores con CompanyProfiles
            TeamAndBranchSeeder::class,   // Crear equipos y sucursales
            ResourceSeeder::class,        // Crear recursos asociados a sucursales
            AppointmentSeeder::class,     // Crea citas, si aplica
        ]);
    }
}
