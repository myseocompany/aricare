<?php

namespace App\Http\Controllers;

use App\Models\CompanyProfile;
use App\Models\Country;
use App\Models\Division;
use App\Models\City;
use Illuminate\Http\Request;

class CompanyProfileController extends Controller
{
    public function create()
    {
        $countries = Country::all();
        return view('company-profiles.create', compact('countries'));
    }

    public function store(Request $request)
    {   
        
        $validated = $request->validate([
            'company_type' => 'required|string|max:50',
            'company_name' => 'required|string|max:255',
            'employee_number' => 'nullable|string|max:20',
            'phone' => 'nullable|string|max:15',
            'country_id' => 'required|exists:countries,id',
            'division_id' => 'nullable|exists:divisions,id',
            'city_id' => 'nullable|exists:cities,id',
            'address' => 'nullable|string',
        ]);

        CompanyProfile::create([
            'user_id' => auth()->id(),
            ...$validated,
        ]);

        return redirect()->route('dashboard')->with('success', 'Perfil de la empresa creado correctamente.');
    }


    public function edit(CompanyProfile $companyProfile)
    {
        $countries = Country::all();
        $divisions = Division::where('country_id', $companyProfile->country_id)->get();
        $cities = City::where('division_id', $companyProfile->division_id)->get();

        return view('company-profiles.edit', compact('companyProfile', 'countries', 'divisions', 'cities'));
    }

    public function update(Request $request, CompanyProfile $companyProfile)
    {
        $validated = $request->validate([
            'company_type' => 'required|string|max:50',
            'company_name' => 'required|string|max:255',
            'employee_number' => 'nullable|string|max:20',
            'phone' => 'nullable|string|max:15',
            'country_id' => 'required|exists:countries,id',
            'division_id' => 'nullable|exists:divisions,id',
            'city_id' => 'nullable|exists:cities,id',
            'address' => 'nullable|string',
        ]);

        $companyProfile->update($validated);

        return redirect()->route('dashboard')->with('success', 'Perfil de la empresa actualizado correctamente.');
    }
}
