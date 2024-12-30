<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use App\Services\ProfileQueryService;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;

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
        // Inyectar el servicio de control de acceso
        $accessControl = app(\App\Services\AccessControlService::class);
    
        // Obtener la consulta de pacientes según el rol del usuario autenticado
        $query = $accessControl->getPatientsQuery(Auth::user());
    
        // Aplicar búsqueda global
        $query = $this->queryService->applySearch($query, ['name', 'email'], $this->search);
    
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
