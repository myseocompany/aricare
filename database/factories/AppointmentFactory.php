<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // Generar fecha y hora en días hábiles y horarios de oficina
        $startOfWeek = Carbon::now()->startOfWeek()->addDays(1); // Lunes de esta semana
        $endOfWeek = Carbon::now()->endOfWeek()->addDays(1); // Domingo de esta semana

        // Generar fecha y hora aleatoria dentro del rango de oficina
        $startDateTime = $this->faker->dateTimeBetween($startOfWeek->format('Y-m-d') . ' 09:00:00', $endOfWeek->format('Y-m-d') . ' 17:00:00');
        while (in_array($startDateTime->format('N'), [6, 7])) { // Evitar fines de semana
            $startDateTime = $this->faker->dateTimeBetween($startOfWeek->format('Y-m-d') . ' 09:00:00', $endOfWeek->format('Y-m-d') . ' 17:00:00');
        }

        // Duración de 30 minutos
        $endDateTime = Carbon::parse($startDateTime)->addMinutes(30);

        return [
            'start_time' => $startDateTime->format('Y-m-d H:i:s'), // Fecha y hora de inicio
            'end_time' => $endDateTime->format('Y-m-d H:i:s'), // Fecha y hora de fin
            'patient' => $this->faker->name(), // Nombre del paciente
            'reason' => $this->faker->randomElement(['Consulta general', 'Primera vez', 'Seguimiento', 'Revisión']), // Motivo
            'description' => $this->faker->sentence(6), // Descripción corta
        ];
    }
}
