<?php

namespace App\Livewire\PatientProfile;

use Livewire\Component;
use App\Models\PatientProfile;

class Show extends Component
{
    public $patientProfile; // Objeto PatientProfile que incluye la relación con User
    

    public function mount($patientProfile)
    {
        
        // Recibimos el paciente como parámetro
        $this->patientProfile = $patientProfile;
    }
    public function openClinicalHistory()
    {
        // Ejemplo: Redirigir a la página de historia clínica o realizar una acción personalizada
        return redirect()->route('clinical-history', ['patientId' => $this->patient->id]);
    }

    public function render()
    {
        return view('livewire.patient-profile.show');
    }


}
