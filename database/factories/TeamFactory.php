<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Team>
 */
class TeamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Seleccionar un usuario existente como administrador o crear uno nuevo
        $admin = User::whereHas('roles', function ($query) {
            $query->where('name', 'admin'); // Busca el rol admin en la relación roles
        })->inRandomOrder()->first();

        if (!$admin) {
            // Si no hay un administrador, crear uno por defecto
            $admin = User::factory()->create();
            // Opcionalmente, asignar rol de administrador aquí si usas una relación explícita
        }

        return [
            'user_id' => $admin->id, // Relación con un usuario administrador
            'name' => $this->faker->unique()->company() . ' Clínica',
            'personal_team' => false,
        ];
    }
}
