<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Country;
use App\Models\Division;
use App\Models\City;
use App\Models\CompanyProfile;
use App\Models\CompanyType;
use App\Models\EmployeeRange;
use Illuminate\Support\Facades\Auth;

class CompanyProfileForm extends Component
{
    public $companyProfile;

    // Campos del formulario
    public $selectedCompanyType;
    public $company_name;
    public $selectedEmployeeRange;
    public $phone;
    public $address;

    // Ubicación
    public $countries;
    public $divisions = [];
    public $cities = [];
    public $selectedCountry = null;
    public $selectedDivision = null;
    public $selectedCity = null;

    // Tablas de look-up
    public $companyTypes;
    public $employeeRanges;

    public function mount()
    {
        // Establecer Colombia como país predeterminado
        $this->selectedCountry = 1; // Asegúrate de que el ID de Colombia en la tabla `countries` sea 1
    
        // Cargar divisiones de Colombia
        $this->divisions = Division::where('country_id', $this->selectedCountry)->get();
    
        // Si hay un perfil de empresa existente, cargar sus datos
        $this->companyProfile = CompanyProfile::where('user_id', Auth::id())->first();
    
        // Tablas de look-up
        $this->companyTypes = CompanyType::all();
        $this->employeeRanges = EmployeeRange::all();
    
        if ($this->companyProfile) {
            $this->selectedCompanyType = $this->companyProfile->company_type_id;
            $this->company_name = $this->companyProfile->company_name;
            $this->selectedEmployeeRange = $this->companyProfile->employee_range_id;
            $this->phone = $this->companyProfile->phone;
            $this->address = $this->companyProfile->address;
    
            $this->selectedDivision = $this->companyProfile->division_id;
            $this->selectedCity = $this->companyProfile->city_id;
    
            $this->cities = City::where('division_id', $this->selectedDivision)->get();
        } else {
            // Inicializar valores en blanco para la creación
            $this->selectedCompanyType = null;
            $this->company_name = '';
            $this->selectedEmployeeRange = null;
            $this->phone = '';
            $this->address = '';
            $this->selectedDivision = null;
            $this->selectedCity = null;
            $this->cities = [];
        }
    }
    
    
    

    public function submit()
    {
        $this->validate([
            'selectedCompanyType' => 'nullable|exists:company_types,id',
            'company_name' => 'required|string|max:255',
            'selectedEmployeeRange' => 'nullable|exists:employee_ranges,id',
            'phone' => 'nullable|string|max:15',
            'selectedCountry' => 'required|exists:countries,id',
            'selectedDivision' => 'nullable|exists:divisions,id',
            'selectedCity' => 'nullable|exists:cities,id',
            'address' => 'nullable|string|max:500',
        ]);
    
        $data = [
            'company_type_id' => $this->selectedCompanyType,
            'company_name' => $this->company_name,
            'employee_range_id' => $this->selectedEmployeeRange,
            'phone' => $this->phone,
            'country_id' => $this->selectedCountry,
            'division_id' => $this->selectedDivision,
            'city_id' => $this->selectedCity,
            'address' => $this->address,
            'user_id' => Auth::id(),
        ];
    
        if ($this->companyProfile) {
            // Actualizar si ya existe
            $this->companyProfile->update($data);
            session()->flash('success', 'Perfil de la empresa actualizado correctamente.');
        } else {
            // Crear si no existe
            $this->companyProfile = CompanyProfile::create($data);
            session()->flash('success', 'Perfil de la empresa creado correctamente.');
        }
    
        return redirect()->route('agendas.index');
    }
    
    
    

    public function render()
    {
        return view('livewire.company-profile-form');
    }

    public function updatedSelectedCountry($countryId)
{
    $this->divisions = Division::where('country_id', $countryId)->get();
    $this->selectedDivision = null;
    $this->selectedCity = null;
    $this->cities = [];
}

public function updatedSelectedDivision($divisionId)
{
    $this->cities = City::where('division_id', $divisionId)->get();
    $this->selectedCity = null;
}

}
