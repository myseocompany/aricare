<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Country;
use App\Models\Division;
use App\Models\City;
use App\Models\CompanyProfile;

class CompanyProfileForm extends Component
{
    public $company_type;
    public $company_name;
    public $employee_number;
    public $phone;
    public $address;

    public $countries;
    public $divisions = [];
    public $cities = [];
    public $selectedCountry = null;
    public $selectedDivision = null;
    public $selectedCity = null;

    public function mount()
    {
        $this->countries = Country::all();
    }

    public function updatedSelectedCountry($countryId)
    {
        $this->divisions = Division::where('country_id', $countryId)->get();
        $this->selectedDivision = null;
        $this->cities = [];
        $this->selectedCity = null;
    }

    public function updatedSelectedDivision($divisionId)
    {
        $this->cities = City::where('division_id', $divisionId)->get();
        $this->selectedCity = null;
    }

    public function submit()
    {
        $this->validate([
            'company_type' => 'required|string|max:50',
            'company_name' => 'required|string|max:255',
            'employee_number' => 'nullable|string|max:20',
            'phone' => 'nullable|string|max:15',
            'selectedCountry' => 'required|exists:countries,id',
            'selectedDivision' => 'nullable|exists:divisions,id',
            'selectedCity' => 'nullable|exists:cities,id',
            'address' => 'nullable|string|max:500',
        ]);

        CompanyProfile::create([
            'user_id' => auth()->id(),
            'company_type' => $this->company_type,
            'company_name' => $this->company_name,
            'employee_number' => $this->employee_number,
            'phone' => $this->phone,
            'country_id' => $this->selectedCountry,
            'division_id' => $this->selectedDivision,
            'city_id' => $this->selectedCity,
            'address' => $this->address,
        ]);

        session()->flash('success', 'Perfil de la empresa creado correctamente.');
        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.company-profile-form');
    }
}
