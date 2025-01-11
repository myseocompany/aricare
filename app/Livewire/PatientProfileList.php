<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use App\Services\ProfileQueryService;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;

class PatientProfileList extends Component
{
    use WithPagination;

    public string $search = '';
    public int $perPage = 10;
    public ?User $selectedPatient = null; // Paciente seleccionado
    private ProfileQueryService $queryService;

    public function __construct()
    {
        // Inyectar el servicio de búsqueda
        $this->queryService = app(ProfileQueryService::class);
    }



    /**
     * Seleccionar un paciente para mostrar su perfil.
     *
     * @param int $patientId
     */
    public function selectPatient(int $patientId)
    {
        try {
            $this->selectedPatient = User::patients()->findOrFail($patientId);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            abort(404, 'Paciente no encontrado.');
        }
    }

    /**
     * Regresar a la lista de pacientes.
     */
    public function backToList()
    {
        $this->selectedPatient = null;
    }

    /**
     * Renderizar la vista del componente.
     */
    public function render()
    {
        if ($this->selectedPatient) {
            
        
            // Mostrar el perfil del paciente seleccionado
            return view('livewire.patient-profile-list', [
                'profileComponent' => 'patient-profile-form',
                'patient' => $this->selectedPatient->id,
            ]);
        }

        // Consulta para listar pacientes
        $query = User::patients()
            ->with(['appointments' => function ($query) {
                $query->where('start_time', '>=', now())
                    ->orderBy('start_time', 'asc');
            }])
            ->leftJoin('patient_profiles', 'users.id', '=', 'patient_profiles.user_id')
            ->select('users.*', 'patient_profiles.id as profile_exists')
            
            ->when($this->search, function ($query) {
                $query->where(function ($subQuery) {
                    $subQuery->where('name', 'like', "%{$this->search}%")
                            ->orWhere('email', 'like', "%{$this->search}%");
                });
            })
            ->orderByRaw("
                (SELECT MIN(start_time)
                FROM appointments
                WHERE appointments.patient_id = users.id
                AND appointments.start_time >= NOW()) DESC
            ");

        // Aplicar búsqueda global
        $query = $this->queryService->applySearch($query, ['name', 'email'], $this->search);

        // Paginar los resultados
        $items = $query->paginate($this->perPage);

        // Renderizar la lista de pacientes
        return view('livewire.patient-profile-list', [
            'items' => $items,
            'columns' => [
                'name' => 'Nombre',
                'email' => 'Correo Electrónico',
                'profile_exists' => 'Perfil de Paciente',
                'next_appointment' => 'Próxima Cita',
            ],
        ]);
    }
}
