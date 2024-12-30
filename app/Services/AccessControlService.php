<?php

namespace App\Services;

use App\Models\User;

class AccessControlService
{
    private $rolePriorityService;

    public function __construct(RolePriorityService $rolePriorityService)
    {
        $this->rolePriorityService = $rolePriorityService;
    }

    public function getPatientsQuery(User $user)
    {
        // Obtener el rol menos restrictivo
        $roles = $user->roles->pluck('name')->toArray(); // Relación de roles del usuario
        $leastRestrictiveRole = $this->rolePriorityService->getLeastRestrictiveRole($roles);

        // Base query para pacientes (usuarios con rol 'patient')
        $query = User::query()->whereHas('roles', function ($q) {
            $q->where('name', 'patient'); // Solo usuarios con rol 'patient'
        });

        // Restricciones según el rol menos restrictivo
        switch ($leastRestrictiveRole) {
            case 'super_admin':
                // Acceso a todos los pacientes
                return $query;

            case 'company_admin':
                // Pacientes asociados a cualquier sucursal del equipo del usuario
                return $query->whereHas('teams', function ($q) use ($user) {
                    $q->where('id', $user->current_team_id);
                });

            case 'branch_admin':
                // Pacientes asociados a la sucursal del usuario
                return $query->whereHas('teams.branches', function ($q) use ($user) {
                    $q->where('branches.id', $user->current_branch_id); // Asegúrate de que esta relación exista
                });

            case 'doctor':
                // Pacientes que tienen citas con el doctor
                return $query->whereHas('appointments', function ($q) use ($user) {
                    $q->where('doctor_id', $user->id); // Relación a través de citas
                });

            case 'assistant':
                // Pacientes de la sucursal del asistente
                return $query->whereHas('teams.branches', function ($q) use ($user) {
                    $q->where('branches.id', $user->current_branch_id); // Relación con la sucursal
                });

            case 'patient':
                // Solo su propio perfil
                return $query->where('id', $user->id);

            default:
                throw new \Exception('Rol no reconocido');
        }
    }
}
