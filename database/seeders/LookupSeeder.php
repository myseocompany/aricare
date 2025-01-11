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
            ['type' => 'estado_civil', 'value' => 'Soltero', 'input_type' => 'select', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'estado_civil', 'value' => 'Casado', 'input_type' => 'select', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'estado_civil', 'value' => 'Divorciado', 'input_type' => 'select', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'estado_civil', 'value' => 'Viudo', 'input_type' => 'select', 'created_at' => now(), 'updated_at' => now()],

            // Ocupaciones
            ['type' => 'ocupacion', 'value' => 'Ingeniero', 'input_type' => 'select', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'ocupacion', 'value' => 'Doctor', 'input_type' => 'select', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'ocupacion', 'value' => 'Abogado', 'input_type' => 'select', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'ocupacion', 'value' => 'Profesor', 'input_type' => 'select', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'ocupacion', 'value' => 'Estudiante', 'input_type' => 'select', 'created_at' => now(), 'updated_at' => now()],

            // EPS (Aseguradoras)
            ['type' => 'eps', 'value' => 'SURA', 'input_type' => 'select', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'eps', 'value' => 'Coomeva', 'input_type' => 'select', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'eps', 'value' => 'Nueva EPS', 'input_type' => 'select', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'eps', 'value' => 'Sanitas', 'input_type' => 'select', 'created_at' => now(), 'updated_at' => now()],

            // Clasificación de Riesgo
            ['type' => 'riesgo', 'value' => 'Riesgo Bajo', 'input_type' => 'select', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'riesgo', 'value' => 'Riesgo Moderado', 'input_type' => 'select', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'riesgo', 'value' => 'Riesgo Alto', 'input_type' => 'select', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'riesgo', 'value' => 'Riesgo Crítico', 'input_type' => 'select', 'created_at' => now(), 'updated_at' => now()],
        
            // Género
            ['type' => 'genero', 'value' => 'HOMBRE', 'input_type' => 'radio', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'genero', 'value' => 'MUJER', 'input_type' => 'radio', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'genero', 'value' => 'OTRO', 'input_type' => 'radio', 'created_at' => now(), 'updated_at' => now()],

            // Tipo de Sangre
            ['type' => 'tipo_sangre', 'value' => 'O+', 'input_type' => 'select', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'tipo_sangre', 'value' => 'O-', 'input_type' => 'select', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'tipo_sangre', 'value' => 'A+', 'input_type' => 'select', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'tipo_sangre', 'value' => 'A-', 'input_type' => 'select', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'tipo_sangre', 'value' => 'B+', 'input_type' => 'select', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'tipo_sangre', 'value' => 'B-', 'input_type' => 'select', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'tipo_sangre', 'value' => 'AB+', 'input_type' => 'select', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'tipo_sangre', 'value' => 'AB-', 'input_type' => 'select', 'created_at' => now(), 'updated_at' => now()],
        
            // Tipo de Documento
            ['type' => 'tipo_documento', 'value' => 'Cédula de Ciudadanía', 'input_type' => 'select', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'tipo_documento', 'value' => 'Tarjeta de Identidad', 'input_type' => 'select', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'tipo_documento', 'value' => 'Pasaporte', 'input_type' => 'select', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'tipo_documento', 'value' => 'Cédula de Extranjería', 'input_type' => 'select', 'created_at' => now(), 'updated_at' => now()],

            // Estados Activo/Inactivo
            ['type' => 'estado', 'value' => 'Activo', 'input_type' => 'boolean', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'estado', 'value' => 'Inactivo', 'input_type' => 'boolean', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('lookups')->insert($lookups);
    }
}
