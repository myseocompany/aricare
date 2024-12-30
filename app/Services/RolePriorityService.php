<?php

namespace App\Services;

class RolePriorityService
{
    // Definir las prioridades de los roles
    private $rolePriorities = [
        'super_admin' => 1,
        'company_admin' => 2,
        'branch_admin' => 3,
        'doctor' => 4,
        'assistant' => 5,
        'patient' => 6,
    ];

    /**
     * Determina el rol menos restrictivo de un usuario.
     * 
     * @param array $roles Lista de roles del usuario (ej: ['doctor', 'patient'])
     * @return string El rol menos restrictivo
     */
    public function getLeastRestrictiveRole(array $roles): string
    {
        // Ordenar los roles por prioridad
        usort($roles, function ($roleA, $roleB) {
            return $this->rolePriorities[$roleA] <=> $this->rolePriorities[$roleB];
        });

        // Retornar el rol con menor prioridad numérica (más autoridad)
        return $roles[0];
    }
}
