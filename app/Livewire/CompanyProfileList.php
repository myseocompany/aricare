<?php

namespace App\Livewire;

use App\Models\User;
use App\Services\ProfileQueryService;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class CompanyProfileList extends Component
{
    use WithPagination;

<<<<<<< HEAD
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
            $q->where('team_user.role', 'admin')->orWhere('team_user.role_id', 3); // 1: ID del rol "paciente"
        });

        // Aplicar búsqueda global con el servicio
        $query = $this->queryService->applySearch($query, [
            'name',       // Campo en la tabla `users`
            'email',      // Campo en la tabla `users`
        ], $this->search);

        // Paginar los resultados
        $items = $query->paginate($this->perPage);

        return view('livewire.company-profile-list', [
            'items' => $items,
            'columns' => [
                'name' => 'Nombre',
                'email' => 'Correo Electrónico',
                'created_at' => 'Fecha de Registro',
            ],
=======
    public $search = '';      // Variable para el filtro de búsqueda
    public $perPage = 10;     // Cantidad de registros por página

    public function render()
    {
        // Consulta con filtro de búsqueda
        $companies = CompanyProfile::with('country') // Cargar relación de país
            ->where('company_name', 'like', '%' . $this->search . '%') // Filtro por nombre
            ->orWhere('phone', 'like', '%' . $this->search . '%')      // Filtro por teléfono
            ->orderBy('company_name')                                 // Ordenar alfabéticamente
            ->paginate($this->perPage);                               // Paginación

        return view('livewire.company-profile-list', [
            'companies' => $companies
>>>>>>> 2428261 (Tablas de lookUp para cuenta de empresa)
        ]);
    }
}
