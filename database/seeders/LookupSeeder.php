<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LookupSeeder extends Seeder
{
    public function run()
    {
        $lookups = [
            // Estado Civil
            ['type' => 'estado_civil', 'value' => 'Soltero', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'estado_civil', 'value' => 'Casado', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'estado_civil', 'value' => 'Divorciado', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'estado_civil', 'value' => 'Viudo', 'created_at' => now(), 'updated_at' => now()],

            // Ocupaciones
            ['type' => 'ocupacion', 'value' => 'Ingeniero', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'ocupacion', 'value' => 'Doctor', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'ocupacion', 'value' => 'Abogado', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'ocupacion', 'value' => 'Profesor', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'ocupacion', 'value' => 'Estudiante', 'created_at' => now(), 'updated_at' => now()],

            // EPS (Aseguradoras)
            ['type' => 'eps', 'value' => 'SURA', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'eps', 'value' => 'Coomeva', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'eps', 'value' => 'Nueva EPS', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'eps', 'value' => 'Sanitas', 'created_at' => now(), 'updated_at' => now()],

            // Clasificación de Riesgo
            ['type' => 'riesgo', 'value' => 'Riesgo Bajo', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'riesgo', 'value' => 'Riesgo Moderado', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'riesgo', 'value' => 'Riesgo Alto', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'riesgo', 'value' => 'Riesgo Crítico', 'created_at' => now(), 'updated_at' => now()],
        
            // Género
            ['type' => 'genero', 'value' => 'HOMBRE', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'genero', 'value' => 'MUJER', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'genero', 'value' => 'OTRO', 'created_at' => now(), 'updated_at' => now()],

            // Tipo de Sangre
            ['type' => 'tipo_sangre', 'value' => 'O+', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'tipo_sangre', 'value' => 'O-', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'tipo_sangre', 'value' => 'A+', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'tipo_sangre', 'value' => 'A-', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'tipo_sangre', 'value' => 'B+', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'tipo_sangre', 'value' => 'B-', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'tipo_sangre', 'value' => 'AB+', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'tipo_sangre', 'value' => 'AB-', 'created_at' => now(), 'updated_at' => now()],
        
            //document_type
            ['type' => 'tipo_documento', 'value' => 'Cédula de Ciudadanía', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'tipo_documento', 'value' => 'Tarjeta de Identidad', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'tipo_documento', 'value' => 'Pasaporte', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'tipo_documento', 'value' => 'Cédula de Extranjería', 'created_at' => now(), 'updated_at' => now()],
            

        ];

        DB::table('lookups')->insert($lookups);
    }
}
