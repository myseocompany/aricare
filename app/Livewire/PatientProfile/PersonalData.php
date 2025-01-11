<?php

namespace App\Livewire\PatientProfile;

use Livewire\Component;
use App\Models\Lookup;
use App\Models\Country;
use App\Models\City;
use App\Models\Division;

use App\Models\PatientProfile;
use Carbon\Carbon;

class PersonalData extends Component
{
    public $countryOptions;
    public $cityOptions = [];
    public $documentTypeOptions;
    public $occupationOptions;
    public $insuranceOptions;
    public $riskLevelOptions;
    public $genderOptions;
    public $bloodTypeOptions;
    public $civilStatusOptions;
    public $statusOptions;
    public $divisionOptions = [];
    public $selectedDivision = null;
    public $selectedCountry = null;

    public int $user_id;
    public $first_name;
    public $middle_name;
    public $last_name;
    public $second_last_name;
    public $document_type_id;
    public $document_id;
    public $gender_id;
    public $blood_type_id;
    public $birth_date;
    public $city_of_birth;
    public $nationality;
    public $is_active;
    public $civil_status_id;
    public $occupation;
    public $insurance_id;
    public $risk_level_id;

    public function mount(int $user_id)
    {
        $this->user_id = $user_id;
        $this->initializePatientProfile();
        $this->initializeOptions();
    }

    private function initializePatientProfile()
    {
        $patientProfile = PatientProfile::firstOrCreate(
            ['user_id' => $this->user_id],
            [
                'birth_date' => now()->format('Y-m-d'),
                'gender_id' => null,
                'blood_type_id' => null,
                'occupation' => '',
            ]
        );

        $this->first_name = $patientProfile->first_name;
        $this->middle_name = $patientProfile->middle_name;
        $this->last_name = $patientProfile->last_name;
        $this->second_last_name = $patientProfile->second_last_name;
        $this->document_type_id = $patientProfile->document_type_id;
        $this->document_id = $patientProfile->document_id;
        $this->gender_id = $patientProfile->gender_id;
        $this->blood_type_id = $patientProfile->blood_type_id;
        $this->birth_date = $patientProfile->birth_date;
        $this->city_of_birth = $patientProfile->city_of_birth;
        $this->nationality = $patientProfile->nationality;
        $this->is_active = $patientProfile->is_active;
        $this->civil_status_id = $patientProfile->civil_status_id;
        $this->occupation = $patientProfile->occupation;
        $this->insurance_id = $patientProfile->insurance_id;
        $this->risk_level_id = $patientProfile->risk_level_id;
    }

    private function initializeOptions()
    {
        $this->civilStatusOptions = Lookup::where('type', 'estado_civil')->pluck('value', 'id');
        $this->occupationOptions = Lookup::where('type', 'ocupacion')->pluck('value', 'id');
        $this->insuranceOptions = Lookup::where('type', 'eps')->pluck('value', 'id');
        $this->riskLevelOptions = Lookup::where('type', 'riesgo')->pluck('value', 'id');
        $this->documentTypeOptions = Lookup::where('type', 'tipo_documento')->pluck('value', 'id');
        $this->genderOptions = Lookup::where('type', 'genero')->pluck('value', 'id');
        $this->bloodTypeOptions = Lookup::where('type', 'tipo_sangre')->pluck('value', 'id');
        $this->statusOptions = Lookup::where('type', 'estado')->pluck('value', 'id');
        $this->countryOptions = Country::pluck('name', 'id');

        if ($this->city_of_birth) {
            $this->loadCities();
        }
    }

    public function updatedSelectedCountry($countryId)
    {
        $this->selectedDivision = null; // Resetear división seleccionada
        $this->divisionOptions = Division::where('country_id', $countryId)->pluck('name', 'id'); // Cargar divisiones
        $this->cityOptions = []; // Resetear ciudades

        //logger('Divisiones cargadas:', $this->divisionOptions);
        //logger('Ciudades cargadas:', $this->cityOptions);

    }

    public function updatedSelectedDivision($divisionId)
    {
        $this->cityOptions = City::where('division_id', $divisionId)->pluck('name', 'id'); // Cargar ciudades
        //logger('Divisiones cargadas:', $this->divisionOptions);
        //logger('Ciudades cargadas:', $this->cityOptions);

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
            'document_type_id' => 'required|exists:lookups,id',
            'document_id' => 'required|string|max:50|unique:patient_profiles,document_id,' . $this->user_id . ',user_id',
           
            'birth_date' => 'required|date',
            'gender_id' => 'nullable|exists:lookups,id',
            'blood_type_id' => 'nullable|exists:lookups,id',
            'civil_status_id' => 'nullable|exists:lookups,id',
            'occupation' => 'nullable|string|max:255',
            'insurance_id' => 'nullable|exists:lookups,id',
            'risk_level_id' => 'nullable|exists:lookups,id',
            'city_of_birth' => 'nullable|exists:cities,id',
            'nationality' => 'nullable|string|max:255',
            'is_active' => 'required|boolean',
        ]);

        logger(['birth_date' => $this->birth_date]);

        $patientProfile = PatientProfile::updateOrCreate(
            ['user_id' => $this->user_id],
            [
                'first_name' => $this->first_name,
                'middle_name' => $this->middle_name,
                'last_name' => $this->last_name,
                'second_last_name' => $this->second_last_name,
                'document_type_id' => $this->document_type_id,
                'document_id' => $this->document_id,
                
                'gender_id' => $this->gender_id,
                'blood_type_id' => $this->blood_type_id,
                'birth_date' => Carbon::parse($this->birth_date)->format('Y-m-d'),
                'city_of_birth' => $this->city_of_birth,
                'nationality' => $this->nationality,
                'is_active' => $this->is_active,
                'civil_status_id' => $this->civil_status_id,
                'occupation' => $this->occupation,
                'insurance_id' => $this->insurance_id,
                'risk_level_id' => $this->risk_level_id,
            ]
        );

        // Actualizar el nombre del usuario asociado
        $user = $patientProfile->user; // Obtener el usuario relacionado
        if ($user) {
            // Verificar si los campos relevantes están llenos
            if (!empty($this->first_name) && !empty($this->last_name)) {
                // Construir el nombre completo solo si se llenaron los campos necesarios
                $user->name = trim("{$this->first_name} {$this->middle_name} {$this->last_name} {$this->second_last_name}");
                $user->save();
            }
        }


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
            'statusOptions' => $this->statusOptions,
        ]);
    }
}
