<?php

namespace App\Livewire;

use App\Models\User;
use App\Services\ProfileQueryService;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class PatientProfileList extends Component
{
    use WithPagination;

    public string $search = '';
    public int $perPage = 10;
    private ProfileQueryService $queryService;

    public function __construct()
    {
        // Inyectar el servicio de búsqueda
        $this->queryService = app(ProfileQueryService::class);
    }

    public function render()
    {
        // Consulta base para obtener los usuarios con rol de "paciente"
        $query = User::query()->whereHas('teams', function (Builder $q) {
            $q->where('team_user.role', 'patient')->orWhere('team_user.role_id', 6); // 3: ID del rol "paciente"
        });

        // Aplicar búsqueda global con el servicio
        $query = $this->queryService->applySearch($query, [
            'name',       // Campo en la tabla `users`
            'email',      // Campo en la tabla `users`
        ], $this->search);

        // Paginar los resultados
        $items = $query->paginate($this->perPage);

        return view('livewire.patient-profile-list', [
            'items' => $items,
            'columns' => [
                'name' => 'Nombre',
                'email' => 'Correo Electrónico',
                'created_at' => 'Fecha de Registro',
            ],
        ]);
    }
}
