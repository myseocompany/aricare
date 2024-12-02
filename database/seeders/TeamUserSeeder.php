<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtener roles disponibles
        $adminRole = Role::where('name', 'admin')->first();
        $doctorRole = Role::where('name', 'doctor')->first();
        $patientRole = Role::where('name', 'patient')->first();

        // Validar existencia de roles
        if (!$adminRole || !$doctorRole || !$patientRole) {
            echo "Error: Algunos roles no encontrados. Asegúrate de ejecutar RoleSeeder.\n";
            return;
        }

        // Obtener equipos
        $teams = Team::all();

        // Excluir superadmin de las asignaciones a equipos
        $superAdmin = User::where('is_super_admin', true)->first();

        if ($superAdmin) {
            echo "Superadmin identificado y no será asignado a equipos.\n";
        }

        // Asignar Administrador al primer equipo
        $admin = User::where('email', 'admin@clinica.com')->first();
        if ($admin && $teams->isNotEmpty()) {
            $teamId = $teams->first()->id;

            if (!$this->userExistsInTeam($teamId, $admin->id)) {
                DB::table('team_user')->insert([
                    'team_id' => $teamId,
                    'user_id' => $admin->id,
                    'role_id' => $adminRole->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        // Asignar Doctores a equipos
        User::where('is_super_admin', false)
            ->limit(5)
            ->get()
            ->each(function ($doctor) use ($teams, $doctorRole) {
                $randomTeam = $teams->random(); // Cada doctor pertenece a un equipo

                if (!$this->userExistsInTeam($randomTeam->id, $doctor->id)) {
                    DB::table('team_user')->insert([
                        'team_id' => $randomTeam->id,
                        'user_id' => $doctor->id,
                        'role_id' => $doctorRole->id,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            });

        // Asignar Pacientes a equipos
        User::where('is_super_admin', false)
            ->limit(20)
            ->get()
            ->each(function ($patient) use ($teams, $patientRole) {
                $randomTeam = $teams->random(); // Cada paciente pertenece a un equipo

                if (!$this->userExistsInTeam($randomTeam->id, $patient->id)) {
                    DB::table('team_user')->insert([
                        'team_id' => $randomTeam->id,
                        'user_id' => $patient->id,
                        'role_id' => $patientRole->id,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            });
    }

    /**
     * Verifica si un usuario ya está asignado a un equipo.
     *
     * @param int $teamId
     * @param int $userId
     * @return bool
     */
    private function userExistsInTeam(int $teamId, int $userId): bool
    {
        return DB::table('team_user')
            ->where('team_id', $teamId)
            ->where('user_id', $userId)
            ->exists();
    }
}
