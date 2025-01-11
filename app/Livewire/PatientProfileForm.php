<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\PatientProfile;

class PatientProfileForm extends Component
{
    public $userId;
    public $patientProfile;

    public $currentTab = 'personal-data';
    private $tabs = [
        'show' => 'patient-profile.show',
        'personal-data' => 'patient-profile.personal-data',
        'address-data' => 'patient-profile.address-data',
        'additional-data' => 'patient-profile.additional-data',
        'responsible' => 'patient-profile.responsible',
        'companion' => 'patient-profile.companion',
        'appointments' => 'patient-profile.appointments',
    ];

    public function mount(int $userId)
    {
        $this->userId = $userId;
        $this->loadOrCreatePatientProfile();
    }

    private function loadOrCreatePatientProfile()
    {
        $this->patientProfile = PatientProfile::with('user')->firstOrCreate(
            ['user_id' => $this->userId],
            [
                'birth_date' => null,
                'gender_id' => null,
                'blood_type_id' => null,
                'phone' => null,
                'address' => null,
            ]
        );
    }

    

    public function setTab(string $tab)
    {
        if (array_key_exists($tab, $this->tabs)) {
            $this->currentTab = $tab;
        }
    }
    

    public function render()
    {
        return view('livewire.patient-profile-form', [
            'tabs' => $this->tabs,
            'patientProfile' => $this->patientProfile,
            'currentComponent' => $this->tabs[$this->currentTab] ?? null,
        ]);
    }
}
