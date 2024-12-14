<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Country;
use App\Models\Division;
use App\Models\City;

class LocationSelector extends Component
{
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

    public function render()
    {
        return view('livewire.location-selector');
    }
}
