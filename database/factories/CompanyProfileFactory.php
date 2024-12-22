<?php

namespace Database\Factories;

use App\Models\CompanyProfile;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class CompanyProfileFactory extends Factory
{
    protected $model = CompanyProfile::class;

    public function definition()
    {
        // Seleccionar un usuario aleatorio
        $userId = DB::table('users')->inRandomOrder()->value('id');

        // Seleccionar un tipo de empresa aleatorio
        $companyTypeId = DB::table('company_types')->inRandomOrder()->value('id');

        // Seleccionar un rango de empleados aleatorio
        $employeeRangeId = DB::table('employee_ranges')->inRandomOrder()->value('id');

        // Seleccionar el país Colombia
        $countryId = DB::table('countries')->where('name', 'Colombia')->value('id');

        // Seleccionar una división aleatoria dentro de Colombia
        $divisionId = DB::table('divisions')
            ->where('country_id', $countryId)
            ->inRandomOrder()
            ->value('id');

        // Seleccionar una ciudad aleatoria dentro de la división
        $cityId = DB::table('cities')
            ->where('division_id', $divisionId)
            ->inRandomOrder()
            ->value('id');

        return [
            'user_id' => $userId,
            'company_type_id' => $companyTypeId,
            'employee_range_id' => $employeeRangeId,
            'company_name' => $this->faker->company,
            'phone' => $this->faker->numerify('300#######'), // Número telefónico simulado
            'country_id' => $countryId,
            'division_id' => $divisionId,
            'city_id' => $cityId,
            'address' => $this->faker->address,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
