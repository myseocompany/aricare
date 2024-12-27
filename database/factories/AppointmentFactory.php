<?php

namespace Database\Factories;

use App\Models\AppointmentType;
use App\Models\Branch;
use App\Models\Resource;
use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class AppointmentFactory extends Factory
{
    public function definition()
    {
        $team = Team::inRandomOrder()->first() ?? Team::factory()->create();
        $branch = Branch::where('team_id', $team->id)->inRandomOrder()->first() ?? Branch::factory()->create(['team_id' => $team->id]);

        $patient = User::whereHas('roles', function ($query) use ($team) {
            $query->where('roles.name', 'patient')->where('team_user.team_id', $team->id);
        })->inRandomOrder()->first();

        if (!$patient) {
            $patient = User::factory()->create();
            $patient->assignRole('patient', $team->id);
        }

        $doctor = User::whereHas('roles', function ($query) use ($team) {
            $query->where('roles.name', 'doctor')->where('team_user.team_id', $team->id);
        })->inRandomOrder()->first();

        if (!$doctor) {
            $doctor = User::factory()->create();
            $doctor->assignRole('doctor', $team->id);
        }

        $resource = Resource::where('branch_id', $branch->id)->inRandomOrder()->first();

        if (!$resource) {
            $resource = Resource::factory()->create(['branch_id' => $branch->id]);
        }

        $startOfWeek = Carbon::now()->startOfWeek()->addDays(1);
        $endOfWeek = Carbon::now()->endOfWeek()->addDays(1);

        $startDateTime = $this->faker->dateTimeBetween($startOfWeek->format('Y-m-d') . ' 09:00:00', $endOfWeek->format('Y-m-d') . ' 17:00:00');
        while (in_array($startDateTime->format('N'), [6, 7])) {
            $startDateTime = $this->faker->dateTimeBetween($startOfWeek->format('Y-m-d') . ' 09:00:00', $endOfWeek->format('Y-m-d') . ' 17:00:00');
        }

        $endDateTime = Carbon::parse($startDateTime)->addMinutes(30);

        $appointmentType = AppointmentType::inRandomOrder()->first() ?? AppointmentType::factory()->create();

        return [
            'start_time' => $startDateTime,
            'end_time' => $endDateTime,
            'patient_id' => $patient->id,
            'doctor_id' => $doctor->id,
            'team_id' => $team->id,
            'branch_id' => $branch->id,
            'resource_id' => $resource->id, // Relación con la unidad asignada
            'reason' => $this->faker->randomElement(['Consulta general', 'Primera vez', 'Seguimiento', 'Revisión']),
            'description' => $this->faker->sentence(6),
            'type_id' => $appointmentType->id,
        ];
    }
}
