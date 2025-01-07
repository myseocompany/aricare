<?php

namespace App\Livewire\PatientProfile;

use Livewire\Component;
use App\Models\Appointment;

class Appointments extends Component
{
    public $patientProfile;

    public function mount($patientProfile)
    {
        $this->patientProfile = $patientProfile;
    }

    public function render()
    {
        $appointments = Appointment::where('patient_id', $this->patientProfile->user_id)
                                    ->where('is_completed', false)
                                    ->orderBy('start_time')
                                    ->get();

        return view('livewire.patient-profile.appointments', compact('appointments'));
    }
}
