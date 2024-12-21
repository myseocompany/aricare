<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanyTypesSeeder extends Seeder
{
    public function run(): void
    {
        $types = [
            'Consultorios Médicos',
            'Especialistas Médicos',
            'Consultorios Odontológicos',
            'Centros de Rehabilitación y Fisioterapia',
            'Centros de Estética y Spa',
            'Bienestar Mental',
            'Nutrición y Fitness',
            'Farmacias y Distribuidores',
            'Centros de Diagnóstico',
            'Servicios de Atención Domiciliaria',
            'Otros Servicios de Salud',
        ];

        foreach ($types as $type) {
            DB::table('company_types')->updateOrInsert(
                ['name' => $type],
                ['created_at' => now(), 'updated_at' => now()]
            );
        }
    }
}
