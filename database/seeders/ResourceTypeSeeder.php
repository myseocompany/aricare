<?php

use Illuminate\Database\Seeder;
use App\Models\ResourceType;

class ResourceTypeSeeder extends Seeder
{
    public function run()
    {
        ResourceType::insert([
            ['name' => 'Consultorio', 'description' => 'Espacio general para atención médica', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Unidad Odontológica', 'description' => 'Silla y equipo odontológico', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sala de Rayos X', 'description' => 'Espacio con equipo de radiografía', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sala de Fisioterapia', 'description' => 'Área para rehabilitación física', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
