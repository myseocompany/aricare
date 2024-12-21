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
            DocumentTypeSeeder::class,
            RoleSeeder::class, // Seeder para los roles
            UserSeeder::class,
            TeamAndBranchSeeder::class,
            TeamUserSeeder::class,
            AppointmentSeeder::class,
            CountryStateCitySeeder::class,
            CompanyTypesSeeder::class,
            EmployeeRangeSeeder::class
            
        ]);
    }
}
