<?php

namespace Database\Factories;

use App\Models\Branch;
use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition()
    {
        $team = Team::inRandomOrder()->first() ?? Team::factory()->create();
        $branch = Branch::where('team_id', $team->id)->inRandomOrder()->first() ?? Branch::factory()->create(['team_id' => $team->id]);

        $patient = User::whereHas('roles', function ($query) use ($team) {
            $query->where('roles.name', 'patient')->where('team_user.team_id', $team->id);
        })->inRandomOrder()->first() ?? User::factory()->create()->assignRole('patient');

        $doctor = User::whereHas('roles', function ($query) use ($team) {
            $query->where('roles.name', 'doctor')->where('team_user.team_id', $team->id);
        })->inRandomOrder()->first() ?? User::factory()->create()->assignRole('doctor');

        $startOfWeek = Carbon::now()->startOfWeek()->addDays(1);
        $endOfWeek = Carbon::now()->endOfWeek()->addDays(1);

        $startDateTime = $this->faker->dateTimeBetween($startOfWeek->format('Y-m-d') . ' 09:00:00', $endOfWeek->format('Y-m-d') . ' 17:00:00');
        while (in_array($startDateTime->format('N'), [6, 7])) {
            $startDateTime = $this->faker->dateTimeBetween($startOfWeek->format('Y-m-d') . ' 09:00:00', $endOfWeek->format('Y-m-d') . ' 17:00:00');
        }

        $endDateTime = Carbon::parse($startDateTime)->addMinutes(30);

        return [
            'start_time' => $startDateTime,
            'end_time' => $endDateTime,
            'patient_id' => $patient->id,
            'doctor_id' => $doctor->id,
            'team_id' => $team->id,
            'branch_id' => $branch->id,
            'reason' => $this->faker->randomElement(['Consulta general', 'Primera vez', 'Seguimiento', 'Revisión']),
            'description' => $this->faker->sentence(6),
        ];
    }
}