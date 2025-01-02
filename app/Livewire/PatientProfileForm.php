<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\PatientProfile;

class PatientProfileForm extends Component
{
    public $userId;
    public $patientProfile;

    public $currentTab = 'personal-data';

    public function mount($userId)
    {
        
        $this->userId = $userId;
    
        // Intentar obtener el perfil del paciente
        $this->patientProfile = PatientProfile::where('user_id', $this->userId)->with('user')->first();
    
        // Si no existe, crear uno nuevo
        if (!$this->patientProfile) {
            $this->patientProfile = PatientProfile::create([
                'user_id' => $this->userId,
                'birth_date' => null, // O un valor por defecto si es necesario
                'gender' => null, // O un valor por defecto si es necesario
                'blood_type' => null, // O un valor por defecto si es necesario
                'phone' => null,
                'address' => null,
            ]);
        }
       
    }
    

    public function setTab($tab)
    {
        $this->currentTab = $tab;
    }

    public function render()
    {
        
        return view('livewire.patient-profile-form', [
            'patientProfile' => $this->patientProfile,
        ]);
    }
}
