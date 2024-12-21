<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Country;
use App\Models\Division;
use App\Models\City;
use App\Models\CompanyProfile;
use App\Models\CompanyType;
use App\Models\EmployeeRange;

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

    public function mount(CompanyProfile $companyProfile = null)
    {
        $this->companyProfile = $companyProfile;

        // Cargar tablas de look-up
        $this->companyTypes = CompanyType::all();
        $this->employeeRanges = EmployeeRange::all();

        // Cargar datos iniciales si se está editando
        if ($companyProfile) {
            $this->selectedCompanyType = $companyProfile->company_type_id;
            $this->company_name = $companyProfile->company_name;
            $this->selectedEmployeeRange = $companyProfile->employee_range_id;
            $this->phone = $companyProfile->phone;
            $this->address = $companyProfile->address;

            $this->selectedCountry = $companyProfile->country_id;
            $this->selectedDivision = $companyProfile->division_id;
            $this->selectedCity = $companyProfile->city_id;

            $this->divisions = Division::where('country_id', $this->selectedCountry)->get();
            $this->cities = City::where('division_id', $this->selectedDivision)->get();
        }

        $this->countries = Country::all();
    }

    public function submit()
    {
        $this->validate([
            'selectedCompanyType' => 'required|exists:company_types,id',
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
            'user_id' => auth()->id(),
        ];

        if ($this->companyProfile) {
            $this->companyProfile->update($data);
            session()->flash('success', 'Perfil de la empresa actualizado correctamente.');
        } else {
            CompanyProfile::create($data);
            session()->flash('success', 'Perfil de la empresa creado correctamente.');
        }

        return redirect()->route('company-profiles.index');
    }

    public function render()
    {
        return view('livewire.company-profile-form');
    }
}