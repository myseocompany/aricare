<?php

namespace App\Livewire\PatientProfile;

use Livewire\Component;
use App\Models\User; // User es usado como Patient en este caso
use App\Models\Lookup;
use App\Models\Country;
use App\Models\Division;
use App\Models\City;
use App\Models\PatientProfile;

class PersonalData extends Component
{
    public $countryOptions;
    public $cityOptions = [];
    public $documentTypeOptions;
    public $selectedCountry = null;
    public $selectedDivision = null;
    public $patientProfile; // Objeto PatientProfile que incluye la relación con User
    public $userName;       // Variable para almacenar el nombre del usuario

    public $occupationOptions;
    public $insuranceOptions; 
    public $riskLevelOptions;
    public $genderOptions;
    public $bloodTypeOptions;
    public $civilStatusOptions;
    public $patientProfileId;

    public function mount($patientProfile)
    {
        $this->patientProfile = $patientProfile;
        
        // Opciones de Lookups
        $this->civilStatusOptions = Lookup::where('type', 'estado_civil')->pluck('value', 'id');
        $this->occupationOptions = Lookup::where('type', 'ocupacion')->pluck('value', 'id');
        $this->insuranceOptions = Lookup::where('type', 'eps')->pluck('value', 'id');
        $this->riskLevelOptions = Lookup::where('type', 'riesgo')->pluck('value', 'id');
        $this->documentTypeOptions = Lookup::where('type', 'tipo_documento')->pluck('value', 'id');
        $this->genderOptions = Lookup::where('type', 'genero')->pluck('value', 'id');
        $this->bloodTypeOptions = Lookup::where('type', 'tipo_sangre')->pluck('value', 'id');

        // Países y Ciudades
        $this->countryOptions = Country::pluck('name', 'id');
        if ($this->patientProfile->city_of_birth) {
            $this->selectedCountry = City::find($this->patient->city_of_birth)->division->country_id;
            $this->loadCities();
        }
    }

    

    public function updatedSelectedCountry($countryId)
    {
        $this->cityOptions = [];
        $this->loadCities();
    }

    private function loadCities()
    {
        if ($this->selectedCountry) {
            $this->cityOptions = City::whereHas('division', function ($query) {
                $query->where('country_id', $this->selectedCountry);
            })->pluck('name', 'id');
        }
    }

    public function save()
    {
        $this->validate([
            'patient.document_type_id' => 'required|exists:lookups,id',
            'patient.document_id' => 'required|string|max:50|unique:patient_profiles,document_id',
            'patient.birth_date' => 'required|date',
            'patient.gender' => 'required|string',
            'patient.blood_type' => 'nullable|string',
            'patient.civil_status_id' => 'nullable|exists:lookups,id',
            'patient.occupation_id' => 'nullable|exists:lookups,id',
            'patient.insurance_id' => 'nullable|exists:lookups,id',
            'patient.risk_level_id' => 'nullable|exists:lookups,id',
            'patient.city_of_birth' => 'nullable|exists:cities,id',
        ]);
    
            // Guardar los datos del paciente con el user_id asociado
        $this->patientProfile->user_id = $this->userId; // Asegúrate de asociar el user_id
        $this->patientProfile->save();
    
        session()->flash('message', 'Datos personales guardados exitosamente.');
    }
    

    public function render()
    {
        return view('livewire.patient-profile.personal-data', [
            'countryOptions' => $this->countryOptions,
            'cityOptions' => $this->cityOptions,
            'civilStatusOptions' => $this->civilStatusOptions,
            'occupationOptions' => $this->occupationOptions,
            'insuranceOptions' => $this->insuranceOptions,
            'riskLevelOptions' => $this->riskLevelOptions,
            'documentTypeOptions' => $this->documentTypeOptions,
            'genderOptions' => $this->genderOptions,
            'bloodTypeOptions' => $this->bloodTypeOptions,
        ]);
    }
}
