<<<<<<< HEAD
<?php 
=======
<?php
>>>>>>> 2428261 (Tablas de lookUp para cuenta de empresa)

namespace App\Livewire;

use App\Models\User;
<<<<<<< HEAD
use App\Services\ProfileQueryService;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class DoctorProfileList extends Component
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
        // Consulta base para obtener los usuarios con rol de "doctor"
        $query = User::query()->whereHas('teams', function (Builder $q) {
            $q->where('role', 'doctor')->orWhere('role_id', 4); // Filtro por rol "doctor"
        });

        // Aplicar búsqueda global con el servicio
        $query = $this->queryService->applySearch($query, [
            'name',       // Campo en la tabla `users`
            'email',      // Campo en la tabla `users`
        ], $this->search);

        // Paginar los resultados
        $items = $query->paginate($this->perPage);

        return view('livewire.doctor-profile-list', [
            'items' => $items,
            'columns' => [
                'name' => 'Nombre',
                'email' => 'Correo Electrónico',
                'teams.role' => 'Rol',
                'created_at' => 'Fecha de Registro',
            ],
=======

class DoctorProfileList extends ProfileList
{
    public $columns = [
        'name' => 'Nombre',
        'email' => 'Correo Electrónico',
        'doctorProfile.phone' => 'Teléfono', // Accedemos al campo phone desde la relación
    ];

    public function render()
    {
        // Filtrar usuarios con el rol de doctor
        $items = User::with('doctorProfile') // Incluye la relación
            ->whereHas('teams', function ($query) {
                $query->where('role', 'doctor')->orWhere('role_id', 2);
            })
            ->where(function ($query) {
                foreach (array_keys($this->columns) as $field) {
                    if (str_contains($field, '.')) {
                        // Filtrar en relaciones
                        $relation = explode('.', $field)[0];
                        $column = explode('.', $field)[1];
                        $query->orWhereHas($relation, function ($q) use ($column) {
                            $q->where($column, 'like', '%' . $this->search . '%');
                        });
                    } else {
                        // Filtrar en campos directos
                        $query->orWhere($field, 'like', '%' . $this->search . '%');
                    }
                }
            })
            ->paginate($this->perPage);

        return view('livewire.profile-list', [
            'items' => $items,
            'columns' => $this->columns,
>>>>>>> 2428261 (Tablas de lookUp para cuenta de empresa)
        ]);
    }
}
