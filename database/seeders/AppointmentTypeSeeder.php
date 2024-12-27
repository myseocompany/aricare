<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AppointmentType;

class AppointmentTypeSeeder extends Seeder
{
    public function run()
    {
        $types = [
            ['name' => 'Asignadas', 'description' => 'Citas asignadas a un paciente', 'color' => '#15CCCC'], // Turquesa
            ['name' => 'Confirmadas', 'description' => 'Citas confirmadas por el paciente', 'color' => '#F7BC1E'], // Amarillo
            ['name' => 'Paciente en sala', 'description' => 'Paciente esperando en sala', 'color' => '#61B0FF'], // Azul claro
            ['name' => 'Iniciar atención', 'description' => 'Atención médica en progreso', 'color' => '#E47070'], // Verde
            ['name' => 'Finalizar atención', 'description' => 'Atención finalizada', 'color' => '#46B988'], // Verde oscuro
            ['name' => 'No cumplida', 'description' => 'Cita no asistida por el paciente', 'color' => '#E65889'], // Rojo
            ['name' => 'Reasignada', 'description' => 'Cita reprogramada', 'color' => '#415BE7'], // Morado
        ];
/*
        $types = [
            ['name' => 'Asignadas', 'description' => 'Citas asignadas a un paciente', 'color' => '#00C8C8'], // Turquesa
            ['name' => 'Confirmadas', 'description' => 'Citas confirmadas por el paciente', 'color' => '#FDF0BD'], // Amarillo
            ['name' => 'Paciente en sala', 'description' => 'Paciente esperando en sala', 'color' => '#E6F3FC'], // Azul claro
            ['name' => 'Iniciar atención', 'description' => 'Atención médica en progreso', 'color' => '#ECF4E7'], // Verde
            ['name' => 'Finalizar atención', 'description' => 'Atención finalizada', 'color' => '#D5ECE0'], // Verde oscuro
            ['name' => 'No cumplida', 'description' => 'Cita no asistida por el paciente', 'color' => '#FCE9ED'], // Rojo
            ['name' => 'Reasignada', 'description' => 'Cita reprogramada', 'color' => '#EBE0FF'], // Morado
        ];
*/
        foreach ($types as $type) {
            AppointmentType::updateOrCreate(
                ['name' => $type['name']], // Evita duplicados
                ['description' => $type['description'], 'color' => $type['color']]
            );
        }
    }
}
